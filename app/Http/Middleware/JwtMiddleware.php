<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
   /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle(Request $request, Closure $next)
        {
            try {
                $user = JWTAuth::parseToken()->authenticate();
                $request['user_id']=$user->user_id;
            } catch (Exception $e) {
                if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                    return response()->json(['status'=> false,'message' => 'Unauthorized User'],401);
                }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                    return response()->json(['status'=> false,'message' => 'Token is Expired'],401);
                }else{
                    return response()->json(['status'=> false,'message' => 'Authorization Token not found'],401);
                }
            }
            return $next($request);
        }
}
