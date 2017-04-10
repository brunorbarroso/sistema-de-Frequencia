<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        /*if( $request ) {
            if( $request->user()->funcao == 0 && ( substr_count($request->route()->getPath(),"projetos") > 0 || substr_count($request->route()->getPath(),"usuarios") > 0 ) ) {
                return redirect('home');
            }
        }*/

        return $next($request);
    }
}
