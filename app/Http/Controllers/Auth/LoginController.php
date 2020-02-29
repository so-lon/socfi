<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Socialite;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the social network authentication page
     *
     * @return Response
     */
    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from social network
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        // Get social network's user infomation
        $user = Socialite::driver($provider)->user();

        // Create user with information from social network
        $createdUser = User::firstOrCreate([
            'name'        => $user->getName(),
            'email'       => $user->getEmail(),
            'role'        => constants('user.role.player'),
            'avatar'      => $user->getAvatar(),
            'provider'    => $provider,
            'provider_id' => $user->getId(),
        ]);

        // Login with account was created recently
        Auth::login($createdUser);

        return redirect()->route('index');
    }
}
