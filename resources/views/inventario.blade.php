<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $nombre ?? '' }}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    </head>
    <body>
        @include('layouts.menu')
            
        @include('layouts.modalAdd')
        @include('layouts.modalEdit')
        @include('layouts.modalDelete')

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div> 
        @endif
        
        <div class="text-center">
            <a href="" class="btn btn-default btn-rounded addbtn" data-toggle="modal" data-target="#modalAdd">Añadir producto</a>
            @can('isAdmin')
                <a href="" class="btn btn-default btn-rounded addbtn" data-toggle="modal" data-target="#modalAddCat">Añadir categoria</a>
                <a href="" class="btn btn-default btn-rounded addbtn" data-toggle="modal" data-target="#modalAddMarca">Añadir marca</a>
            @endcan
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
                                    <td><a href="" class="btn btn-edit delete"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                </tbody>
            </table>
        </div>
        @can('isAdmin')
            @include('layouts.tablas-admin')
        @endcan
        
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
                var tableC = $('#datatable-categorias').DataTable();
                var tableM = $('#datatable-marcas').DataTable();

                //Productos
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
                    event.preventDefault()
                    $tr = $(this).closest('tr');
                    if($($tr).hasClass('Child')){
                        $tr = $tr.prev('.parent');
                    }
                    var data = table.row($tr).data();
                    console.log(data);

                    $('#nombrePE').val(data[1]);

                    $('#deleteForm').attr('action', '/inventario/' + data[0]);
                    $('#modalDelete').modal('show');
                })

                //Categorias
                tableC.on('click', '.editCat', function(){
                    event.preventDefault()
                    $tr = $(this).closest('tr');
                    if($($tr).hasClass('Child')){
                        $tr = $tr.prev('.parent');
                    }

                    var data = tableC.row($tr).data();
                    console.log(data);

                    $('#nombreCat').val(data[1]);

                    $('#editFormCat').attr('action', '/categoria/' + data[0]);
                    $('#modalEditCat').modal('show');
                })

                tableC.on('click', '.deleteCat', function(){
                    event.preventDefault()
                    $tr = $(this).closest('tr');
                    if($($tr).hasClass('Child')){
                        $tr = $tr.prev('.parent');
                    }
                    var data = tableC.row($tr).data();
                    console.log(data);

                    $('#nombreCE').val(data[1]);

                    $('#deleteFormCat').attr('action', '/categoria/' + data[0]);
                    $('#modalDeleteCat').modal('show');
                })

                //Marcas
                tableM.on('click', '.editMarca', function(){
                    event.preventDefault()
                    $tr = $(this).closest('tr');
                    if($($tr).hasClass('Child')){
                        $tr = $tr.prev('.parent');
                    }

                    var data = tableM.row($tr).data();
                    console.log(data);

                    $('#nombreMarca').val(data[1]);

                    $('#editFormMarca').attr('action', '/marca/' + data[0]);
                    $('#modalEditMarca').modal('show');
                })

                tableM.on('click', '.deleteMarca', function(){
                    event.preventDefault()
                    $tr = $(this).closest('tr');
                    if($($tr).hasClass('Child')){
                        $tr = $tr.prev('.parent');
                    }
                    var data = tableM.row($tr).data();
                    console.log(data);

                    $('#nombreME').val(data[1]);

                    $('#deleteFormMarca').attr('action', '/marca/' + data[0]);
                    $('#modalDeleteMarca').modal('show');
                })
            });
        </script>

    </body>
</html>