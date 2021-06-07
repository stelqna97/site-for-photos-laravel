@extends('layouts.app')

@section('content')

<div class="container">
    <h3 class="d-flex justify-content-center" style="padding: 10px;font-weight: bold;">Всички снимки</h3>
<a href="">
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
        <h5 class="card-title">Добавена от: {{$photo->user->name}} ({{$photo->user->email}})</h5>
        <p class="card-text">{{$photo->description}}</p>
        <p class="card-text"><small class="text-muted">Добавена на: {{$photo->created_at}}</small></p>
        @can('admin')
        <a class="btn btn-outline-danger" href="{{route('photo.remove',$photo->id)}}">
           Изтрии </a>
           @endcan
      </div>
    </div>
    @endforeach
</a>
  </div>   
      
@endforeach  
<div class="d-flex align-items-end flex-column mt-auto p-2" style=""> 
{{$photos->links()}}
</div>
  @else
  <div class="alert alert-primary d-flex justify-content-center" role="alert">
    Няма добавени снимки!
  </div>
  @endif
</div>
</div>
@endsection