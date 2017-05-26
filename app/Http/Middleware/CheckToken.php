<?php

namespace App\Http\Middleware;

use App\API;
use Closure;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tkn = $request->input('token');
        $user_id = $request->input('user_id');
        $api = API::where('user_id', $user_id)
            ->where('token', $tkn)
            ->first();
        if ($api == null) {
            return "-1";
        }

        return $next($request);
    }
}
