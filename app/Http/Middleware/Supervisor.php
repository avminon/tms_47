<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\User;

class Supervisor
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

        if($user->isTrainee()) {
            // return redirect()->back();
        }
        return $next($request);
    }
}
