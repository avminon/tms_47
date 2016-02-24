<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\User;

class Trainee
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

        if($user->isSupervisor()) {
            $supervisorPath = str_replace('trainee', 'supervisor', url()->current());
            // return redirect($supervisorPath);
        }
        return $next($request);
    }
}
