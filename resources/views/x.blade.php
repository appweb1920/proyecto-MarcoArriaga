<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$nombre}}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    </head>
    <body>
        @include('layouts.menu')
            
        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Nuevo producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body mx-3">
                        <form action="{{ action('HomeController@store') }}" method="POST">
                        @csrf
                            @include('layouts.modalAdd')
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-default">Añadir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Editar producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/inventario" id="editForm" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        @include('layouts.modalEdit')
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Eliminar producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/inventario" id="deleteForm" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <div class="modal-body mx-3">
                            <input type="hidden" name="_method" value="DELETE">
                            <p>¿Estás seguro de querer eliminar?</p>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" id="elimina" class="btn btn-default" >Si, eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="text-center">
            <a href="" class="btn btn-default btn-rounded addbtn" data-toggle="modal" data-target="#modalAdd">Añadir producto</a>
        </div>

        <div class="container-sm ">

            <table id="datatable" class="table table-striped table-bordered table-hover dt-responsive nowrap text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Editar</th>
                        <th scope="col" style="display:none;">Categoria</th>
                        <th scope="col" style="display:none;">Marca</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                        @if(!is_null($productos))
                            @foreach($productos as $p)
                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->nombre}}</td>
                                    <td>{{$p->precio}}</td>
                                    <td>{{$p->costo}}</td>
                                    <td>{{$p->cantidad}}</td>
                                    <td><a href="" class="btn btn-edit edit"><i class="fas fa-edit"></i></a></td>
                                    <td style="display:none;">{{$p->id_categoria}}</td>
                                    <td style="display:none;">{{$p->id_marca}}</td>
                                    <td><a href="" class="btn btn-edit edit delete"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                </tbody>
            </table>
        </div>

        @include('layouts.tablas-admin')
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

        <script type="text/javascript">
        
            $(document).ready(function () {
                
                $('#datatable').DataTable( {
                    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"}
                } );
                $('#datatable-categorias').DataTable( {
                    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"}
                } );
                $('#datatable-marcas').DataTable( {
                    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"}
                } );

                var table = $('#datatable').DataTable();
                var table = $('#datatable-categorias').DataTable();
                var table = $('#datatable-marcas').DataTable();

                table.on('click', '.edit', function(){
                    event.preventDefault()
                    $tr = $(this).closest('tr');
                    if($($tr).hasClass('Child')){
                        $tr = $tr.prev('.parent');
                    }

                    var data = table.row($tr).data();
                    console.log(data);

                    $('#nombre').val(data[1]);
                    $('#precio').val(data[2]);
                    $('#costo').val(data[3]);
                    $('#cantidad').val(data[4]);
                    $('#id_categoria').val(data[5]);
                    $('#id_marca').val(data[6]);

                    $('#editForm').attr('action', '/inventario/' + data[0]);
                    $('#modalEdit').modal('show');
                })

                table.on('click', '.delete', function(){
                    //event.preventDefault()
                    $tr = $(this).closest('tr');
                    if($($tr).hasClass('Child')){
                        $tr = $tr.prev('.parent');
                    }

                    var data = table.row($tr).data();
                    console.log(data);

                    $('#deleteForm').attr('action', '/inventario/' + data[0]);
                    $('#modalDelete').modal('show');
                })
            });
        </script>

    </body>
</html>