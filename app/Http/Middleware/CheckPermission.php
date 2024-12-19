<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }
    // public function handle($request, Closure $next)
    // {
    //     // Check if the user has the 'view_products' permission
    //     if (auth()->user()->can('view_products')) {
    //         return $next($request);
    //     }

    //     // If the user doesn't have permission, redirect or return an error response
    //     return response('Unauthorized.', 403);
    // }
    // public function handle($request, Closure $next)
    // {
    //     // Check if the user has the 'view_products' permission
    //     if (auth()->user()->can('view_products')) {
    //         return $next($request);
    //     }

    //     // If the user doesn't have permission, redirect or return an error response
    //     return response('Unauthorized.', 403);
    // }

    public function handle($request, Closure $next)
{
    // Check if there is an authenticated user
    if (auth()->check()) {
        // Check if the user has the 'view_products' permission
        if (auth()->user()->can('view_products')) {
            return $next($request);
        }
    }

    // If the user doesn't have permission or is not authenticated, redirect or return an error response
    return response('Unauthorized.', 403);
}

}
