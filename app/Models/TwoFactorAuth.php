<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorAuth extends Model
{
    protected $fillable = [
        'user_id',
        'secret',
        'enabled',
        'verified',
        'backup_codes',
        'enabled_at',
    ];

    protected $casts = [
        'enabled' => 'boolean',
        'verified' => 'boolean',
        'backup_codes' => 'array',
        'enabled_at' => 'datetime',
    ];

    protected $hidden = [
        'secret',
        'backup_codes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate a new 2FA secret for a user
     */
    public static function generateSecret(): string
    {
        $google2fa = new Google2FA();
        return $google2fa->generateSecretKey();
    }

    /**
     * Generate QR code URL for Google Authenticator
     */
    public function getQrCodeUrl(User $user): string
    {
        $google2fa = new Google2FA();
        return $google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $this->secret
        );
    }

    /**
     * Verify a TOTP code
     */
    public function verifyCode(string $code): bool
    {
        $google2fa = new Google2FA();
        return $google2fa->verifyKey($this->secret, $code);
    }

    /**
     * Verify a backup code
     */
    public function verifyBackupCode(string $code): bool
    {
        if (!$this->backup_codes || !is_array($this->backup_codes)) {
            return false;
        }

        foreach ($this->backup_codes as $index => $hashedCode) {
            if (hash_equals($hashedCode, bcrypt($code))) {
                // Remove used backup code
                $codes = $this->backup_codes;
                unset($codes[$index]);
                $this->update(['backup_codes' => array_values($codes)]);
                return true;
            }
        }

        return false;
    }

    /**
     * Generate backup codes
     */
    public static function generateBackupCodes(int $count = 10): array
    {
        $codes = [];
        for ($i = 0; $i < $count; $i++) {
            $codes[] = bcrypt(strtoupper(str_random(8)));
        }
        return $codes;
    }
}
