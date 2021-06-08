@extends('layouts.app')

@section('content')

<div class="container">
    <h3 class="d-flex justify-content-center" style="padding: 10px;font-weight: bold;">Профил id:{{$user->id}}</h3>
   
  <div class="card" style="padding: 10px">

   
    <div class="card">
        <div class="card-header">
            {{$user->name}}
          </div>
        <div class="card-body">
        <h5 class="card-title">Име: {{$user->email}}</h5>
        <p class="card-text"><small class="text-muted">Емайл: {{$user->email}}</small></p>
        @if (isset(Auth::user()->id) && Auth::user()->id==$user->id)
        <a class="btn btn-outline-danger" href="{{route('user.edit',$user->id)}}">
           Редактирай </a>
           @endif
      </div>
    </div>

  </div>   

@endsection