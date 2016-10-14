<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Redirect;
use Session;
class ControlDeAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $field, $max_attemps, $time_window,$methode)
    {

     
     $limiter = app (RateLimiter::class);
     if($methode == 'Get') {  
      if($limiter -> tooManyAttempts(
        $this->getkey($request,$field),$max_attemps,$time_window  
        ))   {   
        Session::flush();  
        Session::put('clef', 'valeur');  
        return redirect()->route('signinErr');

      }  else {

        return $next($request);
      }

    } else {

     if($limiter -> tooManyAttempts(
      $this->getkey($request,$field),$max_attemps,$time_window  

      ))   {    
      $clef = $this->getkey($request,$field);
      Session::put('clef', 'valeur');   
      return redirect()->route('signinErr');   
    }  else {
      $limiter->hit($this->getkey($request,$field),$time_window);    
    }
    return $next($request);
  }     
}
public function getkey($request, $field) {
  return '' . $request->ip();
}
}
