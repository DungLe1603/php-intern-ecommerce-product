<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginPages
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $closure)
    {
        if ($request->session()->has('user')) {
            return redirect()->route('admin.dashboard');
        }

        return $closure($request);
    }
}
