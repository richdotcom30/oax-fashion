<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // OAuth Providers table
        Schema::create('oauth_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('provider'); // google, facebook, instagram
            $table->string('provider_id')->unique();
            $table->string('access_token')->nullable();
            $table->string('refresh_token')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->json('provider_data')->nullable();
            $table->timestamps();
            
            $table->index(['provider', 'provider_id']);
            $table->index('user_id');
        });

        // 2FA Secrets table
        Schema::create('two_factor_auths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('secret'); // Encrypted 2FA secret
            $table->boolean('enabled')->default(false);
            $table->boolean('verified')->default(false);
            $table->json('backup_codes')->nullable(); // Hashed backup codes
            $table->timestamp('enabled_at')->nullable();
            $table->timestamps();
            
            $table->unique('user_id');
        });

        // Sessions table for concurrent session management
        Schema::create('user_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('session_id')->unique();
            $table->string('ip_address');
            $table->string('user_agent');
            $table->string('device_type')->nullable();
            $table->string('browser')->nullable();
            $table->string('platform')->nullable();
            $table->string('location')->nullable();
            $table->boolean('is_current')->default(false);
            $table->timestamp('last_activity');
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('last_activity');
        });

        // CAPTCHA Attempts table
        Schema::create('captcha_attempts', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->indexed();
            $table->string('ip_address')->indexed();
            $table->string('action'); // login, register, password_reset
            $table->boolean('success')->default(false);
            $table->timestamp('created_at');
        });

        // Add security fields to users table (excluding password_reset_tokens as Laravel handles it)
        Schema::table('users', function (Blueprint $table) {
            $table->string('password_history')->nullable()->after('password'); // JSON of old password hashes
            $table->integer('failed_login_attempts')->default(0)->after('password_history');
            $table->timestamp('locked_until')->nullable()->after('failed_login_attempts');
            $table->string('captcha_key')->nullable()->after('locked_until');
            $table->boolean('force_password_change')->default(false)->after('captcha_key');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('captcha_attempts');
        Schema::dropIfExists('user_sessions');
        Schema::dropIfExists('two_factor_auths');
        Schema::dropIfExists('oauth_providers');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'password_history',
                'failed_login_attempts',
                'locked_until',
                'captcha_key',
                'force_password_change',
            ]);
        });
    }
};
