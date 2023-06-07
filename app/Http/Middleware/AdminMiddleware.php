<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use function Symfony\Component\VarDumper\Dumper\esc;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ((int)auth()->user()->role == User::ADMIN_ROLE) //необходимо привести строку к инт для корректного сравнения
            return $next($request);
        else
            return redirect()->route('index');
    }
}
