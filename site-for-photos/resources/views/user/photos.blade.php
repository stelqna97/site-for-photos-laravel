@extends('layouts.app')

@section('content')

<div class="container">
    <h3 class="d-flex justify-content-center" style="padding: 10px;font-weight: bold;">Всички снимки на потребителя ({{$user->email}})</h3>

    @if($photos->count()>0)

@foreach ($photos->chunk(5) as $chunk)

  <div class="card-deck" style="padding: 10px">

    @foreach ($chunk as $photo)
    <a href="{{route('photo.show',$photo->id)}}" style="text-decoration:none;color:black">
    <div class="card">
        <div class="card-header">
            {{$photo->title}}
          </div>
        
        <img src="{{URL::to($photo->image)}}" alt="" class="card-img-top embed-responsive-item" >
        <div class="card-body">
        <p class="card-text">{{$photo->description}}</p>
        <p class="card-text"><small class="text-muted">Добавена на: {{$photo->created_at}}</small></p>
        @if (isset(Auth::user()->id) && Auth::user()->id==$photo->user_id)
        <a class="btn btn-outline-danger" href="{{route('photo.remove',$photo->id)}}">
           Изтрии </a>
           @endif
      </div>
    </a>
    </div>
    @endforeach

  </div>   
      
@endforeach  

  @else
  <div class="alert alert-primary d-flex justify-content-center" role="alert">
    Няма добавени снимки!
  </div>
  @endif
</div>
</div>
@endsection