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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Check can view, edit, or delete any user
        Gate::define('manage-all-users', function($user) {
            return $user->hasRole('admin');
        });

        // Managers can edit or delete employees
        Gate::define('manage-employees', function($user) {
            return $user->hasRole('manager');
        });
    }
}
