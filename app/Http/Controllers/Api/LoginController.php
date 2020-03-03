<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Bridge\ClientRepository;

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
            $success['token'] = "";
            $user = Auth::user();
            //check if user already has token
            if ($user->tokens()->first() != null) {
                $success['token'] = 'hiddenToken';
            } else {
                //set scope for token(authorized puropose)
                $scope = [];
                if($user->role == constants('user.role.admin')){
                    $scope = [constants('user.role.admin')];
                } else if(($user->role) == constants('user.role.field_owner')) {
                    $scope = [constants('user.role.field_owner')];
                } else if(($user->role) == constants('user.role.captain')) {
                    $scope = [constants('user.role.captain')];
                } else {
                    $scope = [constants('user.role.player')];
                }
                //create new token with defined scope and return accessToken for front-end
                $success['token'] = $user->createToken('socfi', $scope)->accessToken;
            }

            return response()->json(
                [
                    'success' => $success
                ],
                constants('status.success') //200
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
        dd($input);
        $input['password'] = bcrypt($input['password']);
        $user = User::create(
            [
                'username' => $input['username'],
                'email' => $input['email'],
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
