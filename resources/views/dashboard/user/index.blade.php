@extends('dashboard.master')

@section('content')
    
@include('dashboard.partials.session-flash-status')


<a class="btn btn-success btn-sm mt-3 mb-3" href="{{route('user.create')}}">Crear</a>
<table class="table  table-striped">
    <thead>
        <tr class="bg-primary text-white font-weight-bold">
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Email</td>
            <td>Rol</td>
            <td>Creado</td>
            <td>Actualizado</td>
            <td>Acciones</td>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->rol->key}}</td>
            <td>{{$user->created_at->format('d-m-Y')}}</td>
            <td>{{$user->updated_at->format('d-m-Y')}}</td>
            <td>
                <a href="{{route('user.show',$user->id)}}" class="btn btn-primary">Ver</a>
                <a href="{{route('user.edit',$user->id)}}" class="btn btn-success">Actualizar</a>
                
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$user->id}}">Eliminar</button>
            
                
                
            </td>
        </tr>
            
        @endforeach
    </tbody>
</table>



<!-- Paginacion -->
{{$users->links()}}

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>¿Seguro desea eliminar el user?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
          <form id="formDelete" method="POST" action="{{route('user.destroy',0)}}" data-action="{{route('user.destroy',0)}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
         </form>
        </div>
      </div>
    </div>
  </div>

  <script>
 $(document).ready(function () {
    $('#deleteModal').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) // Button that triggered the modal
var id = button.data('id') // Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

//Construimos el url para eliminar
var action = $('#formDelete').attr('data-action').slice(0,-1)

action+=id

console.log(action)

$('#formDelete').attr('action',action)

var modal = $(this)
modal.find('.modal-title').text('Borrar el Post: ' + id)
})

     
 });     

  </script>

@endsection