<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'password_history',
        'role_id',
        'is_active',
        'phone',
        'avatar',
        'last_login_at',
        'last_login_ip',
        'failed_login_attempts',
        'locked_until',
        'captcha_key',
        'force_password_change',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }

    // Check if user has a specific permission
    public function hasPermission(string $permission): bool
    {
        if (!$this->role) {
            return false;
        }
        
        return $this->role->permissions->contains('slug', $permission);
    }

    // Check if user has a specific role
    public function hasRole(string $role): bool
    {
        return $this->role && $this->role->slug === $role;
    }

    // Check if user is an admin
    public function isAdmin(): bool
    {
        return $this->role && in_array($this->role->slug, ['admin', 'super_admin']);
    }

    // Check if user is a super admin
    public function isSuperAdmin(): bool
    {
        return $this->role && $this->role->slug === 'super_admin';
    }

    // Check if user can access admin panel
    public function canAccessAdmin(): bool
    {
        return $this->is_active && $this->isAdmin();
    }

    // Two-Factor Authentication
    public function twoFactorAuth(): HasOne
    {
        return $this->hasOne(TwoFactorAuth::class);
    }

    // OAuth Providers
    public function oauthProviders(): HasMany
    {
        return $this->hasMany(OAuthProvider::class);
    }

    // Check if email is verified
    public function hasVerifiedEmail(): bool
    {
        return !is_null($this->email_verified_at);
    }

    // Check if account is locked
    public function isLocked(): bool
    {
        return $this->locked_until && $this->locked_until->isFuture();
    }
}
