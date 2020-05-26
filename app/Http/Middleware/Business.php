<?php

namespace App\Http\Middleware;

use Closure;

class Business
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
        $user = $request->user();

        if ($user && $user->userable_type==='App\\BusinessAccount' || $user && $user->userable_type==='App\\PartnerAccount') {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
