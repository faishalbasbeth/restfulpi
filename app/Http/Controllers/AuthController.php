<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;

use App\User;

class AuthController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|min:5'
    	]);

    	$name = $request->input('name');
    	$email = $request->input('email');
    	$password = $request->input('password');

    	$user = new User([
    		'name' => $name,
    		'email' => $email,
    		'password' => bcrypt($password)
    	]);

    	$credentials = [
    		'email' => $email,
    		'password' => $password
    	];

    	if ($user->save()) {

    		try {
    			if (!$token = JWTAuth::attempt($credentials)) {
    				return response()->json([
    					'msg' => 'Email or Password are incorrect',
    				], 404);
    			}
    		} catch (JWTAuthException $e) {
    			return response()->json([
    				'msg' => 'failed_to_create_token',
    			], 400);
    		}

    		$user->signin = [
    			'href' => 'api/v1/user/signin',
    			'method' => 'POST',
    			'params' => 'email, password'
    		];
    		$response = [
    			'msg' => 'User created',
    			'user' => $user,
    			'token' => $token
    		];
    		return response()->json($response, 201);
    	}

    	$response = [
    		'msg' => 'An error occurred'
    	];

    	return response()->json($response, 404);
    }

    public function signin(Request $request)
    {
    	return 'It works';
    }
}
