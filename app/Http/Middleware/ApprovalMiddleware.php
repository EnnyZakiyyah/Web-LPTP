<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApprovalMiddleware
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
        if (auth()->check()) {
            if(!auth()->user()->approved) {
                auth()->logout();

                return redirect('/sign-in')->with('message', 'Tunggu Konfirmasi dari Admin');
            }
            if(auth()->user()->approved == 3) {
                auth()->logout();

                return redirect('/sign-in')->with('message', 'Maaf anda tidak dapat login');
            }
        } 
        
        return $next($request);
    }
}
