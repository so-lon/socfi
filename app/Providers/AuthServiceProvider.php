<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Carbon\Carbon;
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
        Passport::routes();
        // Passport::personalAccessClientId('client-id');
        Passport::tokensExpireIn(Carbon::now()->addDays(15));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        Passport::pruneRevokedTokens();

        //phan quyen theo scope cho token OAuth2
        Passport::tokensCan([
            'admin' => 'Admin privileges',
            'field_owner' => 'Field owner',
            'captain' => 'Captain',
            'player' => 'Player',
        ]);

        /* Define roles */
        Gate::define('isAdmin', function($user) {
            return $user->role == constants('user.role.admin');
        });

        Gate::define('isFieldOwner', function($user) {
            return $user->role == constants('user.role.field_owner');
        });

        Gate::define('isAdminOrFieldOwner', function($user) {
            return $user->role == constants('user.role.admin') || $user->role == constants('user.role.field_owner');
        });

        Gate::define('isCaptain', function($user) {
            return $user->role == constants('user.role.captain');
        });

        Gate::define('isPlayer', function($user) {
            return $user->role == constants('user.role.player');
        });
    }
}
