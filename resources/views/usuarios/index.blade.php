@extends('layouts.app')

@section("contenido")
    <h1>Esto es un listado de usurios buenos</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('usuarios.restaurar')}}" class="btn btn-success mb-3">Restaurar</a>
                <a href="{{route('usuarios.borrado_definitivo')}}" class="btn btn-danger mb-3">Borrado Definitivo</a>
            </div>
        </div>
        <table id="tabla" class="table table-striped table-bordered">
           <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha-Nacimiento</th>
                    <th>Edad</th>
                    <th>Cantidad de publicaciones</th>
                    <th>Borrar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr data-id='{{$usuario->id}}'>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->apellido}}</td>
                    <td>{{$usuario->f_nacimiento}}</td>
                    <td>{{$usuario->edad()}}</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">{{$usuario->publicaciones->count()}}</button></td>
                    <td><a href="" class="btn btn-danger btn_borrar">Borrar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Listado de publicaciones del usuario {{$usuario->nombre}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <table id="tabla" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Usuario ID</th>
                                <th>Título</th>
                                <th>Publicación</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuario->publicaciones as $publicacion)
                            <tr data-id='{{$usuario->id}}'>
                                <td>{{$usuario->id}}</td>
                                <td>{{$publicacion->titulo}}</td>
                                <td>{{$publicacion->publicacion}}</td>
                                <td>{{$publicacion->fecha}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>





<script>
    $(document).ready(function(){

        $('#tabla').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 1 },
                { "orderable": false, "targets": 2 },
            ],
            
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - lo siento",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
            }
        });


        $("#tabla").on("click",".btn_borrar",function(e){
            e.preventDefault();
           
            //confirmar con sweetalert
            Swal.fire({
                title: '¿Estas seguro?',
                text: "No podras revertir esta accion",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //redireccionar a la url
                    //borrar con ajax
                    const tr=$(this).closest("tr"); //tr más cercano al botón, o sea el tr que contiene al botón
                    const id=tr.data("id"); //obtener el id del tr
                    $.ajax({
                        url: "{{url('/usuarios')}}/"+id,
                        method: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(){
                            tr.fadeOut();
                        }
                    })
                }
            })    
        });
    });

    
</script>










@endsection