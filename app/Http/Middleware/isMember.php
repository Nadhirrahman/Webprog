<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $logged_user = Auth::user();

        if(!$logged_user){
            session()->flash('failed', 'Please login first!');
            return redirect('/');
        }else{
            if($logged_user->role != 0){
                session()->flash('failed', 'You are not a member!');
                return redirect('/');
            }else
                return $next($request);
        }
    }
}
