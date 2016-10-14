<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Config;
use Redirect;
use View;
use Session;
use StartSession;
Use Url;
use App\User;
use App\Role;

use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);


        $this->middleware('request_attemps_limiter:email,'.Config::get('app.limitador.maximosIntentos').','.Config::get('app.limitador.timpoLimite').','.'Post',['only'=>[ 'postLogeo',]]);


        $this->middleware('request_attemps_limiter:email,'.Config::get('app.limitador.maximosIntentos').','.Config::get('app.limitador.timpoLimite').','.'Get',['only'=>[ 'getLogeo',]]);

    }

    public function getLogeo()
    {
        return view('Authenticacion.Login', ['errors' => 'NA']);
    }

      public function logout()
    {
        Auth::logout();
        return view('Authenticacion.Login', ['errors' => 'NA']);
    }

    public function postLogeo(Request $request)
    {
      
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['Password']])) {
            $limiter = app (RateLimiter::class);
            $limiter->resetAttempts('' . $request->ip());
            
            if (Auth::user()->activo == 0) {
             Auth::logout();     
         } else {          
            return redirect()->route('main');
         }  
        }
        Session::flush();
       Session::put('code','value'); 
       return redirect()-> route('signinErr');
       
    }

    


}