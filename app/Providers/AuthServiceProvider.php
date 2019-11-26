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

        // Check if user is an admin before allowing
        // to edit users
        Gate::define('edit-users', function($user) {
            // return $user->hasRole('admin');
            return $user->hasAnyRoles(['admin', 'employee']);
        });

        // Check if user is an admin before allowing
        // to delete users
        Gate::define('delete-users', function($user) {
            return $user->hasRole('admin');
        });

        
        Gate::define('manage-all-users', function($user) {
            return $user->hasAnyRoles(['admin', 'employee']);
        });
    }
}
