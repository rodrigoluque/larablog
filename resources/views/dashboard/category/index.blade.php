@extends('dashboard.master')

@section('content')
    
@include('dashboard.partials.session-flash-status')


<a class="btn btn-success btn-sm mt-3 mb-3" href="{{route('category.create')}}">Crear</a>
<table class="table  table-striped">
    <thead>
        <tr class="bg-primary text-white font-weight-bold">
            <td>Id</td>
            <td>Título</td>
            <td>Creación</td>
            <td>Actualización</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->created_at->format('d-m-Y')}}</td>
            <td>{{$category->updated_at->format('d-m-Y')}}</td>
            <td>
                <a href="{{route('category.show',$category->id)}}" class="btn btn-primary">Ver</a>
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">Actualizar</a>
                
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$category->id}}">Eliminar</button>
           </td>
        </tr>
            
        @endforeach
    </tbody>
</table>



<!-- Paginacion -->
{{$categories->links()}}

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
            <p>¿Seguro desea eliminar el category?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
          <form id="formDelete" method="POST" action="{{route('category.destroy',0)}}" data-action="{{route('category.destroy',0)}}">
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
modal.find('.modal-title').text('Borrar el category: ' + id)
})

     
 });     

  </script>

@endsection