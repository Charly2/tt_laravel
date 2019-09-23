@extends('layouts.app')


@section('content')

    <h1 class="text-center">Estamos validando tu información</h1>
    <p class="text-center">Recibiras un correo cuando tu información haya sido validada para poder continuar con el proceso.</p>
    <img class="text-center" style="display: block;margin: auto" src="{{asset('images/valida.svg')}}" alt="">
    <a href="{{url('/dashboard')}}" class="btn btn-primary " style="margin: auto;display: block;max-width: 250px">Ir al inicio</a>

@endsection