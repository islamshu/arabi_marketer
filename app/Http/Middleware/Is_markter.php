<?php

namespace App\Http\Middleware;

use Closure;

class Is_markter
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
        if (auth('api')->check()) {
            if(auth('api')->user()->type == 'marketer'){
                return $next($request);
            }else{
                $response = ['success' => false, 'message' => 'you are not markter','code'=>400];
                if (!empty($errorMessages))
                    $response['data'] = $errorMessages;
                return response()->json($response , 400);
            }
        }else{
            $response = ['success' => false, 'message' => 'you need to login','code'=>400];
            if (!empty($errorMessages))
                $response['data'] = $errorMessages;
            return response()->json($response , 400);
        }
       
      }
    
        
        
        
    
    
}