<?php

namespace App\Http\Middleware;

use Closure;

class LimitIpMiddleware
{
    
     public $whiteListedIps = ['192.115.3.6','127.0.0.1'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
        
    public function handle($request, Closure $next)
    {
        
          if (!in_array($request->ip(), $this->whiteListedIps)) {    
            /*
                 show error. 
             * 
             * 
            */
         $response = [
            'success' => false,
            'message' => "Your Ip address not allowed",
        ];             
              
            return response()->json($response,403);
        }
    
        return $next($request);
    }
    
}
