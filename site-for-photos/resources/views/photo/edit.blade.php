@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    <div class="offset-3 col-md-5 my-lg-5">
      <div class="card">

    
          <div class="card-header text-center">
             Редактиране на снимка
          </div>
        <div class="card-body">
    
            <form action="{{route('photo.update',$photo->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Заглавие</label>
              <input type="text" class="form-control" name="title" value="{{$photo->title}}">
            </div>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Описание</label>
                <textarea name="description" class="form-control" type="text" cols="30" rows="5">{{$photo->description}}</textarea>
            </div>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Предишна снимка</label>
                <img src="{{URL::to($photo->image)}}" alt="" style="height:100px;width:80px;"  />
                <br>
                <input type="file" class="" name="image" >
            </div>
         
           
    
            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Редактирай</button>
          </form>
        </div>
      </div>
    
     
    </div>
    <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
    </div>

@endsection