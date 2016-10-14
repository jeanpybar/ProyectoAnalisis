@extends('layouts.master')
@section('content')

@if ( Session::get('code') != 'value' and Session::get('codigo') != 'valor' and  Session::get('clef') != 'valeur' )  
<h1 style="color: red">   Debe logearse antes </h1>
@endif

@if ( Session::pull('clef') == 'valeur' )   

<h1 style="color: red">   intentos completos , espere  </h1>

@elseif ( Session::pull('code') == 'value' or Session::pull('codigo') == 'valor')
@if ($errors != 'NA')

<div class=" alert alert-danger">
    <strong>Error!  </strong> <span>{{ $errors }}</span>
    <br>
    <br>
</div>
@endif
<form action="{{ route('signin') }}" method="post">
    <div class="input-group">
        <label for="email">E-Mail</label>
        <input type="email" id="email" name="email" placeholder="ingrese su correo">
    </div>
    <div class="input-group">
        <label for="Password">Password</label>
        <input type="Password" id="Password" name="Password" placeholder="ingrese su Password">
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        {{ csrf_field() }}
    </div>  
    <button type="submit">Ingresar</button>
</form>
@endif
@endsection
