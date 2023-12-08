<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 管理者以上に許可
        Gate::define('admin', function ($user) {
            return ($user->role === 'admin');
        });
        // 一般ユーザー以上に許可
        Gate::define('user', function ($user) {
            return ($user->role === NULL);
        });

        
    }
}
