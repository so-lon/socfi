<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Bridge\ClientRepository;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //login successfully
        if (Auth::attempt(
            [
                'username' => request('username'),
                'password' => request('password'),
            ]
        )) {
            $success['accessToken'] = "";
            $user = Auth::user();
            // dd($user);
            $scope = [];
            if ($user->role == constants('user.role.admin')) {
                $scope = ['admin'];
            } else if (($user->role) == constants('user.role.field_owner')) {
                $scope = ['field_owner'];
            } else if (($user->role) == constants('user.role.captain')) {
                $scope = ['captain'];
            } else {
                $scope = ['player'];
            }
            //create new token with defined scope and return accessToken for front-end
            $success['token'] = $user->createToken('MyApp', $scope)->accessToken;
            return response()->json(
                [
                    'message' => 'success',
                    'token' => $success['token'],
                    'id' => $user->id
                ]
            );
        } else {
            //login fail
            return response()->json(
                [
                    'error' => 'Unauthorized',
                ]
            );
        }
    }

    public function loginBySocial(Request $request)
    {
        $createdUser = User::firstOrCreate([
            'username'    => request('username'),
            'name'        => request('name'),
            'email'       => request('email'),
            'role'        => constants('user.role.player'),
            'avatar' => 'img/avatar/default.jpg',
            // 'provider'    => $provider,
            // 'provider_id' => $user->getId(),
        ]);
        // Login with account was created recently
        Auth::login($createdUser);
        $success['token'] = Auth::user()->createToken('MyApp', ['player'])->accessToken;
        // $success['token'] = $createdUser->createToken('MyApp', ['Player'])->accessToken;
        return response()->json(
            [
                'message' => 'success',
                'token' => $success['token'],
                'id' => Auth::user()->id
            ]
        );
    }

    /**
     * Redirect the user to the social network authentication page
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
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
        $success['token'] = Auth::user()->createToken('MyApp', ['player'])->accessToken;
        // $success['token'] = $createdUser->createToken('MyApp', ['Player'])->accessToken;
        return response()->json(
            [
                'success' => $success
            ],
            constants('status.success') //200
        );
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create(
            [
                'username' => $input['username'],
                'email' => $input['email'],
                'name' => $input['name'],
                'role' => constants('user.role.player'),
                'avatar' => 'img/avatar/default.jpg',
                'password' => Hash::make($input['password']),
            ]
        );
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success' => $success], constants('status.success'));
    }

    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], constants('status.success'));
    }
}
