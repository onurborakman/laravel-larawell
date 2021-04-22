<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class LogMiddleware
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
        Log::info("Entering LogMiddleware in handle()");
        if($request->user_name != null){
            Log::info("In not null..." . $request->user_name);
            $value = Cache::store("file")->get("mydata");
            if($value == null){
                Log::info("Caching first time username for : " . $request->user_name);
                Cache::store("file")->put("mydata", $request->user_name, 1);
            }
        }
        else{
            $value = Cache::store("file")->get("mydata");
            if($value != null){
                Log::info("Getting Username from cache: " . $value);
            } else {
                Log::info("Could not get Username from cache (data is older than 1 minute)");
            }
        }
        return $next($request);
    }
}
