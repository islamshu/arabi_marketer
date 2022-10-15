<?php

namespace App\Http\Middleware;

use Closure;

class Is_able_markter
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
            if(auth('api')->user()->type == 'marketer' ){
                if(auth('api')->user()->status == 1){
                    return $next($request);
                }elseif(auth('api')->user()->status == 2){
                    $response = ['success' => false, 'message' => 'Your account has been rejected by the administration','code'=>400];
                    if (!empty($errorMessages))
                        $response['data'] = $errorMessages;
                    return response()->json($response , 200);  
                }elseif(auth('api')->user()->status == 1){
                    $response = ['success' => false, 'message' => 'Your account is under review','code'=>400];
                    if (!empty($errorMessages))
                        $response['data'] = $errorMessages;
                    return response()->json($response , 200);  
                }
            }else{
                $response = ['success' => false, 'message' => 'you cant','code'=>400];
                if (!empty($errorMessages))
                    $response['data'] = $errorMessages;
                return response()->json($response , 200);
            }
        }else{
            $response = ['success' => false, 'message' => 'you need to login','code'=>400];
            if (!empty($errorMessages))
                $response['data'] = $errorMessages;
            return response()->json($response , 200);
        }
       
      }
    
        
        
        
    
    
}