@extends('layouts.app')

@section('content')

@can('user')
<div class="container">
    <h3 class="d-flex justify-content-center" style="padding: 10px;font-weight: bold;">Всички потребители</h3>
    @if($users->count()>0)
@foreach ($users->chunk(5) as $chunk)
 
  <div class="card-deck" style="padding: 10px">

    @foreach ($chunk as $user)
    <a href="" style="text-decoration:none;color:black">
    <div class="card">
        <div class="card-header">
            {{$user->name}}
          </div>
        
        <div class="card-body">
        <h5 class="card-title"> {{$user->email}} </h5>
        <p class="card-text">Брой добавени снимки:{{$user->photo->count()}}</p>
        <p class="card-text"><small class="text-muted">Добавен на: {{$user->created_at}}</small></p>
        @can('admin')
        <a class="btn btn-outline-danger" href="">
           Изтрии </a>
           @endcan
      </div>
    </a>
    </div>
    @endforeach

  </div>   
      
@endforeach  
<div class="d-flex align-items-end flex-column mt-auto p-2" style=""> 
{{$users->links()}}
</div>
  @else
  <div class="alert alert-primary d-flex justify-content-center" role="alert">
    Няма добавени поттребители!
  </div>
  @endif
</div>
</div>
@endcan


@can('admin')
<div class="container">
    <h3 class="d-flex justify-content-center" style="padding: 10px;font-weight: bold;">Всички потребители</h3>
    @if($users->count()>0)
@foreach ($users->chunk(5) as $chunk)
 
  <div class="card-deck" style="padding: 10px">

    @foreach ($chunk as $user)
    <a href="" style="text-decoration:none;color:black">
    <div class="card">
        <div class="card-header">
            {{$user->name}}
          </div>
        
        <div class="card-body">
        <h5 class="card-title"> {{$user->email}} </h5>
        <p class="card-text">Брой добавени снимки:{{$user->photo->count()}}</p>
        @can('admin')
        <p class="card-text">Роля: {{$user->role->name}}</p>
        @endcan
        <p class="card-text"><small class="text-muted">Добавен на: {{$user->created_at}}</small></p>
        @can('admin')
        <a class="btn btn-outline-danger" href="{{route('user.remove',$user->id)}}">
           Изтрии </a>
        <a class="btn btn-outline-primary" href="{{route('user.photos',$user->id)}}">
            Виж снимките </a>
            @if (Auth::user()->id!=$user->id)
            <a class="btn btn-outline-danger" href="{{route('user.edit',$user->id)}}">
               Редактирай </a>
               @endif
           @endcan
      </div>
    </a>
    </div>
    @endforeach

  </div>   
      
@endforeach  
<div class="d-flex align-items-end flex-column mt-auto p-2" style=""> 
{{$users->links()}}
</div>
  @else
  <div class="alert alert-primary d-flex justify-content-center" role="alert">
    Няма добавени поттребители!
  </div>
  @endif
</div>
</div>
@endcan

@endsection