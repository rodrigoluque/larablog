@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

@include('dashboard.partials.session-flash-status')

  <div class="row">
      <div class="col">

        <form  action="{{ route('post.update',$post->id) }}" method="post">
            @method('PUT')
            @include('dashboard.post._form')

        
            </form> 

          <form action="{{route("post.image",$post->id)}}" method="POST" enctype="multipart/form-data" class="mt-2 mb-2">
            @csrf
            <div class="row">
             <div class="col"><input type="file" name="image" id="image" class="form-control"></div>
             <div class="col"><input type="submit" value="Subir" class="btn btn-primary"></div>
           </div>
          </form>

      </div><!-- ./col -->
  </div><!-- ./row -->
     

@endsection
