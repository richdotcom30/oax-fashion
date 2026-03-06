<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CaptchaValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Skip CAPTCHA validation if disabled in config
        if (!config('services.captcha.enabled', false)) {
            return;
        }

        // Skip if no captcha response provided (using 'sometimes')
        if (empty($value)) {
            return;
        }

        $secretKey = config('services.captcha.secret_key');

        if (empty($secretKey)) {
            Log::warning('CAPTCHA is enabled but secret key is not configured');
            $fail('CAPTCHA validation is not properly configured.');
            return;
        }

        // Verify the captcha with Google
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $value,
            'remoteip' => request()->ip(),
        ]);

        $result = $response->json();

        if (!$result['success']) {
            Log::warning('CAPTCHA validation failed', [
                'success' => $result['success'] ?? false,
                'error-codes' => $result['error-codes'] ?? [],
            ]);
            $fail('CAPTCHA validation failed. Please try again.');
        }

        // Check score threshold for v3 (optional)
        if (isset($result['score']) && $result['score'] < 0.5) {
            Log::warning('CAPTCHA score too low', ['score' => $result['score']]);
            $fail('CAPTCHA validation failed. Please try again.');
        }
    }
}
