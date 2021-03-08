@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

@include('dashboard.partials.session-flash-status')

  <div class="row">
      <div class="col">

        <form  action="{{ route('user.store') }}" method="POST">
          @include('dashboard.user._form',['pwd'=>true])

            
            </form> 
      </div><!-- ./col -->
  </div><!-- ./row -->
     

@endsection
