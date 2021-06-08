@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    <div class="offset-3 col-md-5 my-lg-5">
      <div class="card">

    
          <div class="card-header text-center">
             Редактиране на профил ид:{{$user->id}}
          </div>
        <div class="card-body">
    
            <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Име</label>
              <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Емайл</label>
                <textarea name="email" class="form-control" type="text" cols="30" rows="5">{{$user->email}}</textarea>
            </div>
    

        
            <input type="hidden"  name="roles" value="{{$user->role->id}}" >
         

              @can('admin')
              @if(Auth::user()->id!=$user->id)
              <div class="form-group">
                <label for="role" >Роля </label>
                <div class="form-group">
                <select name="roles"  class="form-control" >
                @foreach($roles as $role )
                <option value="{{$role->id}}" class="form-control"   
                    @if (($user->role_id)==$role->id)) selected @endif>{{ $role->name }}</option>
                @endforeach
=               </select>   
            </div>     
            </div>
             @endif
             @endcan
            
    
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