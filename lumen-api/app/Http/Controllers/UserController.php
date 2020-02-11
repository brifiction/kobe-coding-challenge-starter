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
     * @return \Illuminate\Http\JsonResponse
     * @url /register
     */
    public function register(Request $request)
    {
        $theHash = app()->make('hash');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $theHash->make($request->input('password'));
        $role = $request->input('role');
        $apiToken = sha1(time() . rand(1, 9999));

        $register = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'api_token' => $apiToken,
        ]);

        if ($register) {
            $response['success'] = true;
            $response['message'] = 'Registration successful.';

            return response()->json($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'Registration failed.';

            return response()->json($response);
        }
    }

    /**
     * Get the user data by ID
     *
     * @param $request Request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @url /user/{id}
     */
    public function getUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $response['success'] = true;
            $response['message'] = $user;

            return response()->json($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'The user not found, or does not exist.';

            return response()->json($response);
        }
    }

    /**
     * Validate User using their api_token
     *
     * @param $request Request
     * @param $api_token
     * @return \Illuminate\Http\JsonResponse
     * @url /user/api/{api_token}
     */
    public function getUserApi(Request $request, $api_token)
    {
        $user = User::where('api_token', $api_token)->first();

        if ($user) {
            $response['success'] = true;
            $response['message'] = $user;

            return response()->json($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'API key is invalid.';

            return response()->json($response);
        }
    }
}
