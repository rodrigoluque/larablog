@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

@include('dashboard.partials.session-flash-status')

  <div class="row">
      <div class="col">

        <form  action="{{ route("category.store")}}" method="POST">
          @include('dashboard.category._form')

            
            </form> 
      </div><!-- ./col -->
  </div><!-- ./row -->
     

@endsection
