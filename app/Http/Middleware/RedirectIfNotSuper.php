<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfNotSuper
{
/**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @param  string|null  $guard
 * @return mixed
 */
public function handle($request, Closure $next, $guard = 'teacher')
{
    if (Auth::guard($guard)->user()->type != 1) {
		return back()
				->with('message','Beyond your Authentication.');
    }
    return $next($request);
    }
}  