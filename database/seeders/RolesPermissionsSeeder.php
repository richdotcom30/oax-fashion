<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Create Roles
        $roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'super_admin',
                'description' => 'Full access to all features',
                'level' => 5,
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrative access with most permissions',
                'level' => 4,
            ],
            [
                'name' => 'Manager',
                'slug' => 'manager',
                'description' => 'Can manage products and orders',
                'level' => 3,
            ],
            [
                'name' => 'Staff',
                'slug' => 'staff',
                'description' => 'Limited management access',
                'level' => 2,
            ],
            [
                'name' => 'Customer',
                'slug' => 'customer',
                'description' => 'Regular customer account',
                'level' => 1,
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['slug' => $role['slug']],
                $role
            );
        }

        // Create Permissions
        $permissions = [
            // Dashboard
            ['name' => 'View Dashboard', 'slug' => 'view_dashboard', 'module' => 'dashboard'],
            
            // Products
            ['name' => 'View Products', 'slug' => 'view_products', 'module' => 'products'],
            ['name' => 'Create Products', 'slug' => 'create_products', 'module' => 'products'],
            ['name' => 'Edit Products', 'slug' => 'edit_products', 'module' => 'products'],
            ['name' => 'Delete Products', 'slug' => 'delete_products', 'module' => 'products'],
            
            // Orders
            ['name' => 'View Orders', 'slug' => 'view_orders', 'module' => 'orders'],
            ['name' => 'Manage Orders', 'slug' => 'manage_orders', 'module' => 'orders'],
            ['name' => 'Process Orders', 'slug' => 'process_orders', 'module' => 'orders'],
            
            // Customers
            ['name' => 'View Customers', 'slug' => 'view_customers', 'module' => 'customers'],
            ['name' => 'Manage Customers', 'slug' => 'manage_customers', 'module' => 'customers'],
            
            // Collections
            ['name' => 'View Collections', 'slug' => 'view_collections', 'module' => 'collections'],
            ['name' => 'Manage Collections', 'slug' => 'manage_collections', 'module' => 'collections'],
            
            // Inventory
            ['name' => 'View Inventory', 'slug' => 'view_inventory', 'module' => 'inventory'],
            ['name' => 'Manage Inventory', 'slug' => 'manage_inventory', 'module' => 'inventory'],
            
            // Marketing
            ['name' => 'View Marketing', 'slug' => 'view_marketing', 'module' => 'marketing'],
            ['name' => 'Manage Marketing', 'slug' => 'manage_marketing', 'module' => 'marketing'],
            
            // Analytics & Reports
            ['name' => 'View Analytics', 'slug' => 'view_analytics', 'module' => 'analytics'],
            ['name' => 'View Reports', 'slug' => 'view_reports', 'module' => 'reports'],
            
            // Settings
            ['name' => 'View Settings', 'slug' => 'view_settings', 'module' => 'settings'],
            ['name' => 'Manage Settings', 'slug' => 'manage_settings', 'module' => 'settings'],
            
            // Users (Staff management)
            ['name' => 'View Users', 'slug' => 'view_users', 'module' => 'users'],
            ['name' => 'Manage Users', 'slug' => 'manage_users', 'module' => 'users'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['slug' => $permission['slug']],
                $permission
            );
        }

        // Assign permissions to roles
        $this->assignPermissionsToRoles();
        
        // Create a default admin user
        $this->createDefaultAdmin();
    }

    private function assignPermissionsToRoles(): void
    {
        // Super Admin - gets all permissions
        $superAdmin = Role::where('slug', 'super_admin')->first();
        $allPermissions = Permission::all();
        $superAdmin->permissions()->sync($allPermissions->pluck('id'));

        // Admin - gets most permissions except user management
        $admin = Role::where('slug', 'admin')->first();
        $adminPermissions = Permission::whereNotIn('slug', ['manage_users'])->get();
        $admin->permissions()->sync($adminPermissions->pluck('id'));

        // Manager - gets dashboard, products, orders, inventory, analytics
        $manager = Role::where('slug', 'manager')->first();
        $managerPermissions = Permission::whereIn('slug', [
            'view_dashboard',
            'view_products', 'create_products', 'edit_products',
            'view_orders', 'manage_orders', 'process_orders',
            'view_customers',
            'view_collections', 'manage_collections',
            'view_inventory', 'manage_inventory',
            'view_analytics', 'view_reports',
        ])->get();
        $manager->permissions()->sync($managerPermissions->pluck('id'));

        // Staff - limited permissions
        $staff = Role::where('slug', 'staff')->first();
        $staffPermissions = Permission::whereIn('slug', [
            'view_dashboard',
            'view_products',
            'view_orders', 'process_orders',
            'view_customers',
            'view_inventory',
        ])->get();
        $staff->permissions()->sync($staffPermissions->pluck('id'));

        // Customer - no admin permissions (handled by customer role)
        $customer = Role::where('slug', 'customer')->first();
        $customer->permissions()->sync([]);
    }

    private function createDefaultAdmin(): void
    {
        $adminRole = Role::where('slug', 'admin')->first();
        
        $admin = \App\Models\User::updateOrCreate(
            ['email' => 'admin@oaxfashion.com'],
            [
                'name' => 'Admin',
                'password' => \Hash::make('admin123'),
                'role_id' => $adminRole->id,
                'is_active' => true,
            ]
        );
        
        // Create token for the admin
        if (!$admin->tokens()->count()) {
            $token = $admin->createToken('admin-token');
            // Note: In production, you'd want to store this securely
        }
        
        // Create a manager user as well
        $managerRole = Role::where('slug', 'manager')->first();
        \App\Models\User::updateOrCreate(
            ['email' => 'manager@oaxfashion.com'],
            [
                'name' => 'Manager',
                'password' => \Hash::make('manager123'),
                'role_id' => $managerRole->id,
                'is_active' => true,
            ]
        );
        
        // Create a default customer user
        $customerRole = Role::where('slug', 'customer')->first();
        \App\Models\User::updateOrCreate(
            ['email' => 'customer@oaxfashion.com'],
            [
                'name' => 'Customer',
                'password' => \Hash::make('customer123'),
                'role_id' => $customerRole->id,
                'is_active' => true,
            ]
        );
    }
}
