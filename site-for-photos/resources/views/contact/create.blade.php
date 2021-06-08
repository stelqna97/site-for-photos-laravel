@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="offset-3 col-md-5 my-lg-5">
      <div class="card">

    
          <div class="card-header text-center">
             Връзка с нас
          </div>
         
        <div class="card-body">
    
            <form action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Име</label>
              <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Емайл</label>
                <input type="email" class="form-control" name="email">
            </div>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Съобщение</label>
                <textarea name="msg" class="form-control" type="text" cols="30" rows="5"></textarea>
            </div>
    
          
            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Изпрати</button>
          </form>
        </div>
      </div>
   
    </div>
    <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
    </div>

@endsection