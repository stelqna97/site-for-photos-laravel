@extends('layouts.app')

@section('content')


<div class="container">
    <h3 class="d-flex justify-content-center" style="padding: 10px;font-weight: bold;">Всички снимки</h3>
   
  <div class="card" style="padding: 10px">

   
    <div class="card">
        <div class="card-header">
            {{$photo->title}}
          </div>
        
        <img src="{{URL::to($photo->image)}}" alt="" class="card-img-top embed-responsive-item" >
        <div class="card-body">
        <h5 class="card-title">Добавена от: {{$photo->user->name}} ({{$photo->user->email}})</h5>
        <p class="card-text">{{$photo->description}}</p>
        <p class="card-text"><small class="text-muted">Добавена на: {{$photo->created_at}}</small></p>
        @can('admin')
        <a class="btn btn-outline-danger" href="{{route('photo.edit',$photo->id)}}">
           Редактирай </a>
           @endcan
      </div>
    </div>

  </div>   
      


@endsection