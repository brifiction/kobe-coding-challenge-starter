<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Administrator
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Auth\Factory $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            if ($request->has('api_token')) {
                $tokenForm = $request->input('api_token');
                $tokenDb = User::where('api_token', $tokenForm)
                    ->where('role', 'administrator')
                    ->first();
                if (empty($tokenDb)) {
                    $response['success'] = false;
                    $response['message'] = 'API Token is invalid.';

                    return response()->json($response);
                }
            } else {
                if ($request->header('api-token')) {
                    return $next($request);
                }

                $response['success'] = false;
                $response['message'] = 'Login is required.';

                return response()->json($response);
            }
        }

        return $next($request);
    }
}
