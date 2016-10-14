@extends('layouts.master')
@section('content')
<form action="{{ route('signin') }}" method="post">
    <div class="input-group">
        <label for="email">E-Mail</label>
        <input type="email" id="email" name="email" placeholder="ingrese su correo">
    </div>
    <div class="input-group">
        <label for="Password">Password</label>
        <input type="Password" id="Password" name="Password" placeholder="ingrese su Password">
    </div>
    {{ csrf_field() }}
    <button type="submit">Ingresar</button>
</form>
@endsection
