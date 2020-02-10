<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Register new User
     *
     * @param $request Request
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function register(Request $request)
    {
        $theHash = app()->make('hash');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $theHash->make($request->input('password'));
        $role = $request->input('role');

        $register = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);

        if ($register) {
            $response['success'] = true;
            $response['message'] = 'Registration successful.';

            return response($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'Registration failed.';

            return response($response);

        }
    }

    /**
     * Get the user data by ID
     *
     * @param $request Request
     * @param $id
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @url /user/{id}
     */
    public function getUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $response['success'] = true;
            $response['message'] = $user;

            return response($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'The user not found, or does not exist.';

            return response($response);
        }
    }

    /**
     * Validate User using their api_token
     *
     * @param $request Request
     * @param $api_token
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @url /user/api/{api_token}
     */
    public function getUserApi(Request $request, $api_token)
    {
        $user = User::where('api_token', $api_token)->first();

        if ($user) {
            $response['success'] = true;
            $response['message'] = $user;

            return response($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'API key is invalid.';

            return response($response);
        }
    }
}
