<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        /*if($user->email != 'lucas@gmmail.com'){
            return redirect('/');
        }*/

        if(!in_array($user->email, ['vweimann@example.net', 'lucas@gmmail.com'])){
            return redirect('/');
        }

        return $next($request);
    }
}
