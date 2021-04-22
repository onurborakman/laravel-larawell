<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class MySecurityMiddleware
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
//        $path = $request->path();
//        Log::info("Entering MySecurityMiddleware in handle() at path: " . $path);
//        $secureCheck = true;
//
//        if(Auth::check()){
//            return $next($request);
//        }
//
//        if($request->is('/login')|| $request->is('/register') ||$request->is('/') && !Auth::check()){
//            $secureCheck = false;
//        }
//        Log::info($secureCheck ? "MySecurityMiddleware in handphp le()... Neeeds Security" : "MySecurityMiddleware in handle()... No Security Required");
//        Log::info("This is the session in middleware: " . session()->get('security'));
//        if(session()->get('security') == 'enabled'){
//            return $next($request);
//        }
//        if($secureCheck){
//            Log::info("Leaving MySecurityMiddleware in handle() doing a redirect back to login");
//            return redirect('login');
//        }
        if(Auth::check()){

            return $next($request);

        }else{

            return redirect('login');

        }

    }
}
