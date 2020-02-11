<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
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
     * Welcome function
     *
     * Provide a welcome message to the visitor.
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @url /
     */
    public function welcome() {
        $response['success'] = true;
        $response['result'] = "Welcome to Brian's Tabletop Games";

        return response($response);
    }

    /**
     * Login function
     *
     * When user login successfully, it will retrieve a callback as api_token.
     * @param Request $request
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @url /login
     */
    public function login(Request $request)
    {
        $theHash = app()->make('hash');
        $email = $request->input('email');
        $password = $request->input('password');
        $dataUser = User::where('email', $email)->first();

        if ($dataUser) {
            if ($theHash->check($password, $dataUser->password)) {
                $apiToken = sha1(time());
                $updateTokenDb = User::find($dataUser->id)->update(['api_token' => $apiToken]);
                if ($updateTokenDb) {
                    $response['success'] = true;
                    $response['api_token'] = $apiToken;
                    $response['message'] = $dataUser;

                    return response($response);
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Error unknown.';

                    return response($response);
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Email and password seems to be incorrect.';

                return response($response);
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Email and password failed to recognize.';

            return response($response);
        }
    }
}
