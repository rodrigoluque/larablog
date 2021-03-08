@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

@include('dashboard.partials.session-flash-status')

  <div class="row">
      <div class="col">

        <form  action="{{ route('user.update',$user->id) }}" method="POST">
            @method('PUT')
            @include('dashboard.user._form',['pwd'=>false])

        
            </form> 

      </div><!-- ./col -->
  </div><!-- ./row -->
     

@endsection
