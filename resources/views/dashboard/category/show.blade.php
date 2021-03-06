@extends('dashboard.master')

@section('content')

  <div class="row">
      <div class="col">

                <div class="form-group">
                    <label for="">Título</label>
                    <input readonly type="text" class="form-control" name="title" value="{{$category->title}}"> 
                    
                </div>
                <!-- ./form-group -->
           
                
                <div class="form-group">
                    <label for="">Url</label>
                    <input readonly type="text" class="form-control" name="url" value="{{$category->url}}">
                </div>
                <!-- ./form-group -->
        

            <a href="{{route('category.index')}}" class="btn btn-primary rounded-pill">Volver</a>
            
      </div><!-- ./col -->
  </div><!-- ./row -->
     

@endsection
