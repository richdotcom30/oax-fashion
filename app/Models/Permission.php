<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'module',
    ];

    // Permission modules
    public const MODULE_DASHBOARD = 'dashboard';
    public const MODULE_PRODUCTS = 'products';
    public const MODULE_ORDERS = 'orders';
    public const MODULE_CUSTOMERS = 'customers';
    public const MODULE_COLLECTIONS = 'collections';
    public const MODULE_INVENTORY = 'inventory';
    public const MODULE_MARKETING = 'marketing';
    public const MODULE_ANALYTICS = 'analytics';
    public const MODULE_REPORTS = 'reports';
    public const MODULE_SETTINGS = 'settings';
    public const MODULE_USERS = 'users';

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }

    // Scope by module
    public function scopeModule($query, string $module)
    {
        return $query->where('module', $module);
    }
}
