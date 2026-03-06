<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAttempt extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'email',
        'ip_address',
        'user_agent',
        'success',
        'created_at',
    ];

    protected $casts = [
        'success' => 'boolean',
        'created_at' => 'datetime',
    ];

    // Record a login attempt
    public static function record(string $email, bool $success): self
    {
        return self::create([
            'email' => $email,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'success' => $success,
            'created_at' => now(),
        ]);
    }

    // Check if email is locked out due to failed attempts
    public static function isLockedOut(string $email, int $maxAttempts = 5, int $lockoutMinutes = 15): bool
    {
        $failedAttempts = self::where('email', $email)
            ->where('success', false)
            ->where('created_at', '>=', now()->subMinutes($lockoutMinutes))
            ->count();

        return $failedAttempts >= $maxAttempts;
    }

    // Get recent failed attempts for an email
    public static function getFailedAttempts(string $email, int $minutes = 15): int
    {
        return self::where('email', $email)
            ->where('success', false)
            ->where('created_at', '>=', now()->subMinutes($minutes))
            ->count();
    }
}
