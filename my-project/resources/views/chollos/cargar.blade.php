@extends('inicio')

@section('chollos')
@if(session('mensaje'))
<p>{{session("mensaje")}}</p>
@endif
<p>Chollos!!</p>
    @foreach($chollos as $chollo)
    <div>
        <p>{{$chollo->titulo}}</p>
        <p>User:{{$chollo->user->name}}</p>
        <a href={{route("editarChollo",$chollo->id)}}>Editar Chollo</a>
    </div>
    @endforeach
@endsection