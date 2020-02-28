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

        /* Define roles */
        Gate::define('isAdmin', function($user) {
            return $user->role == constants('user.role.admin');
        });

        Gate::define('isFieldOwner', function($user) {
            return $user->role == constants('user.role.field_owner');
        });

        Gate::define('isCaptain', function($user) {
            return $user->role == constants('user.role.captain');
        });

        Gate::define('isPlayer', function($user) {
            return $user->role == constants('user.role.player');
        });
    }
}
