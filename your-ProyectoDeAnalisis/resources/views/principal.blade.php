@extends('layouts.master')
@section('content')
@if(Auth::check())
Conectado: {{Auth::user()->first_name}}
@endif
@endsection