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
        @if (isset(Auth::user()->id) && Auth::user()->id==$photo->user_id)
        <a class="btn btn-outline-danger" href="{{route('photo.edit',$photo->id)}}">
           Редактирай </a>
           @endif
      </div>
    </div>

  </div> 
  
  <div class="container">
    <h5 class="d-flex justify-content-center" style="padding: 10px;font-weight: bold;"> Коментари</h3>

      @if($comments->count()<10)
      @if($comm_user->count()==0)
        <div class="card">
            <div class="card-header text-center">
               Добави коментар
            </div>
           
          <div class="card-body">
      
              <form action="{{route('comment.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Заглавие</label>
                <input type="text" class="form-control" name="title">
              </div>
  
              <div class="form-group">
                  <label for="exampleInputEmail1">Коментар</label>
                  <textarea name="comment" class="form-control" type="text" cols="30" rows="5"></textarea>
              </div>

              <input type="hidden"  name="user_id" value="{{Auth::user()->id}}">
              <input type="hidden"  name="photo_id" value="{{$photo->id}}">

              <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Коментирай</button>
            </form>
          </div>
        </div>
        @else
        <div class="card">
          <div class="card-header text-center">
             Редактирай своя коментар
          </div>
         
        <div class="card-body">
    
            <form action="{{route('comment.update',$com_user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Заглавие</label>
              <input type="text" class="form-control" name="title" value="{{$com_user->title ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Коментар</label>
                <textarea name="comment" class="form-control" type="text" cols="30" rows="5">{{$com_user->comment ?? ''}}</textarea>
            </div>

             <input type="hidden"  name="user_id" value="{{Auth::user()->id}}" >
            <input type="hidden"  name="photo_id" value="{{$photo->id}}" > 


            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Редактирай</button>
          </form>
        </div>
      </div>

            
        @endif
        @else
        <div class="alert alert-primary d-flex justify-content-center" role="alert">
          Надвишен лимит на коментари!
        </div>
        @endif

        @if($comments->count()>0)
@foreach($comments as $comment)
  <div class="card">
    <div class="card-header">
      {{$comment->title}}
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>{{$comment->comment}}</p>
        <footer class="blockquote-footer">{{$comment->user->email}} <cite title="Source Title">{{$comment->created_at}}</cite></footer>
      </blockquote>
     @can('admin')
      <a class="btn btn-outline-danger" href="{{route('comment.remove',$comment->id)}}">
         Изтрии </a>
         @endcan
    </div>
    @endforeach
    @else
    <div class="alert alert-primary d-flex justify-content-center" role="alert">
      Няма добавени коментари!
    </div>
    
  </div
 
  @endif


@endsection