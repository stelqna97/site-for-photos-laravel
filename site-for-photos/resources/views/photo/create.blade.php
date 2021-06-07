@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="offset-3 col-md-5 my-lg-5">
      <div class="card">

    
          <div class="card-header text-center">
             Добави снимка
          </div>
          @if($photos<10)
        <div class="card-body">
    
            <form action="{{route('photo.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Заглавие</label>
              <input type="text" class="form-control" name="title">
            </div>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Описание</label>
                <textarea name="description" class="form-control" type="text" cols="30" rows="5"></textarea>
            </div>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Снимка</label>
                <input type="file" class="" name="image">
            </div>
         
           
    
            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Добави</button>
          </form>
        </div>
      </div>
    @else
    <div class="alert alert-primary" role="alert">
       Надвишен лимит! Може да качите до 10 снимки!
      </div>
    @endif
    </div>
    <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
    </div>

@endsection