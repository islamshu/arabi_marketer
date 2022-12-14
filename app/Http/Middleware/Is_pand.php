<?php

namespace App\Http\Middleware;

use Closure;

class Is_pand
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
            if(auth('api')->user()->is_pan != 1){
                return $next($request);
            }else{
                $user = auth('api')->user();
                $user->tokens->each(function ($token, $key) {
                    $token->delete();
                });
                $user->token = null;
                $user->save();
                return redirect('/https://sub.arabicreators.com/signIn');
                $response = ['success' => false, 'message' => 'your are pan','code'=>400];
                 if (!empty($errorMessages))
                   $response['data'] = $errorMessages;
                return response()->json($response , 200);
            }
        }else{
            return $next($request);

        }
       
      }
    
        
        
        
    
    
}