@extends('dashboard.master')

@section('content')

  <div class="row">
      <div class="col">

       
            @csrf
           
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input readonly type="text" class="form-control" name="name" value="{{$user->name}}"> 
                    
                </div>
                <!-- ./form-group -->
           
                
                <div class="form-group">
                    <label for="surname">Apellido</label>
                    <input readonly type="text" class="form-control" name="surname" value="{{$user->surname}}">
                </div>
                <!-- ./form-group -->


                <div class="form-group">
                    <label for="rol_id">Rol</label>
                    <input readonly type="text" class="form-control" name="rol_id" value="{{$user->rol->key}}">
                </div>
                <!-- ./form-group -->
           

                <div class="form-group">
                    <label for="email">Email</label>
                    <input readonly type="text" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <!-- ./form-group -->


                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input readonly type="text" class="form-control" name="password" value="{{$user->password}}">
                </div>
                <!-- ./form-group -->
               
                    
           

            <a href="{{route('user.index')}}"class="btn btn-primary rounded-pill" >Volver</a>
            
      </div><!-- ./col -->
  </div><!-- ./row -->
     

@endsection
