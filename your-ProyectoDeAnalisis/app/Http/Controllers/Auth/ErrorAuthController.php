<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class ErrorAuthController extends Controller
{
      public function getPagLogeoError(Request $request)
    {
        
        return view('Authenticacion.Login', ['errors' => 'Datos Erroneos']);
    }
}
