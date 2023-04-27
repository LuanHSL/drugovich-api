<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManagerLevelTwoAuth
{
    const LEVEL_TWO = 2;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('manager')->user()->level != self::LEVEL_TWO) {
            return response()->json(["messages" => "Você não tem as permissões necessárias para acessar esta rota"], 403);
        }
        
        return $next($request);
    }
}
