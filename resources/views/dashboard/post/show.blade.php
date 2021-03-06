@extends('dashboard.master')

@section('content')

  <div class="row">
      <div class="col">

       
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="">Título</label>
                    <input readonly type="text" class="form-control" name="title" value="{{$post->title}}"> 
                    
                </div>
                <!-- ./form-group -->
           
                
                <div class="form-group">
                    <label for="">Url</label>
                    <input readonly type="text" class="form-control" name="url" value="{{$post->url}}">
                      
                         
                </div>
                <!-- ./form-group -->
           
                
                <label for="">Contenido</label>
                <textarea readonly name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea> 
            
                    
            </div>
            <!-- ./form-group -->

            <button class="btn btn-primary rounded-pill">Crear</button>
            
      </div><!-- ./col -->
  </div><!-- ./row -->
     

@endsection
