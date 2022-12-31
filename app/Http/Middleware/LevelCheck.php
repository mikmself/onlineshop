<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LevelCheck
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->level == "admin"){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
