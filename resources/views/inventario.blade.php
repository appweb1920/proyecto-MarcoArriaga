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
        <link rel="icon" href="{{URL::asset('/image/logo.ico')}}" type="image/icon type">
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
        @can('isAdmin')
            <div class="sep-sect" id="productosHS"><i class="fas fa-chevron-up"></i> Productos</div>
        @endcan
        <div class="container-sm tsp">

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

        <footer class="text-center">
            <img class="logo" src="{{URL::asset('/image/logo.png')}}" alt="Logo">
        </footer>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/tablas.js') }}"></script>
    </body>
</html>