@extends('layouts.app')

@section('content')

@can('admin')
  <div class="container" style="padding-top:50px ">
    <h3 class="d-flex justify-content-center" style="padding: 10px;font-weight: bold;">Последни регистрирани потребители</h3>

    @if($users->count()>0)
  <div class="card-deck">

    @foreach ($users as $user)
    <div class="card">
        <h4 class="card-title">{{$user->id}}</h5>
              <div class="card-body">
        <h5 class="card-title">{{$user->name}}</h5>
        <p class="card-text">{{$user->email}}</p>
        <p class="card-text"><small class="text-muted">{{$user->created_at}}</small></p>
      </div>
    </div>
    @endforeach
  </div>
  @else
  <div class="alert alert-primary d-flex justify-content-center" role="alert">
    Няма добавени потребители!
  </div>
  @endif
</div>

<div class="container" style="padding-top:50px ">
    <h3 class="d-flex justify-content-center" style="padding: 10px;font-weight: bold;">Последни добавени снимки</h3>

    @if($photos->count()>0)
  <div class="card-deck">

    @foreach ($photos as $photo)
    <div class="card" >
        <div class="card-header">
            {{$photo->title}}
          </div>
        
        <img src="{{URL::to($photo->image)}}" alt="" class="card-img-top embed-responsive-item" >
        <div class="card-body">
        <h5 class="card-title">Добавена от: {{$photo->user->name}} ({{$photo->user->email}})</h5>
        <p class="card-text">{{$photo->description}}</p>
        <p class="card-text"><small class="text-muted">Добавена на: {{$photo->created_at}}</small></p>
      </div>
    </div>
    @endforeach
  </div>      
  @else
  <div class="alert alert-primary d-flex justify-content-center" role="alert">
    Няма добавени снимки!
  </div>
  @endif
</div>
@endcan

@can('user')

<div class="container" style="padding-top:50px ">
  <h3 class="d-flex justify-content-center" style="padding: 10px;font-weight: bold;">Последни добавени снимки</h3>

  @if($photos_10->count()>0)
  @foreach ($photos_10->chunk(5) as $chunk)
<div class="card-deck">

  @foreach ($chunk as $photo)
  <div class="card" >
      <div class="card-header">
          {{$photo->title}}
        </div>
      
      <img src="{{URL::to($photo->image)}}" alt="" class="card-img-top embed-responsive-item" >
      <div class="card-body">
      <h5 class="card-title">Добавена от: {{$photo->user->name}} ({{$photo->user->email}})</h5>
      <p class="card-text">{{$photo->description}}</p>
      <p class="card-text"><small class="text-muted">Добавена на: {{$photo->created_at}}</small></p>
    </div>
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
@endcan


  
@endsection
