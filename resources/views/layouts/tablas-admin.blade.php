<div class="sep-sect" id="categoriasHS"><i class="fas fa-chevron-right"></i> Categorias</div>

<div class="container-sm tsc">
    <table id="datatable-categorias" class="table table-striped table-bordered table-hover dt-responsive nowrap text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
                <!--<th scope="col">Borrar</th>-->
            </tr>
        </thead>
        <tbody>
                @if(!is_null($categorias))
                    @foreach($categorias as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->nombre}}</td>   
                            <td><a href="" class="btn btn-edit editCat"><i class="fas fa-edit"></i></a></td>
                            <!--<td><a href="" class="btn btn-edit deleteCat"><i class="fas fa-trash-alt"></i></a></td>-->
                        </tr>
                    @endforeach
                @endif
        </tbody>
    </table>
</div>
<div class="sep-sect" id="marcasHS"><i class="fas fa-chevron-right"></i> Marcas</div>
<div class="container-sm tsm">
    <table id="datatable-marcas" class="table table-striped table-bordered table-hover dt-responsive nowrap text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Marca</th>
                <th scope="col">Editar</th>
                <!--<th scope="col">Borrar</th>-->
            </tr>
        </thead>
        <tbody>
                @if(!is_null($marcas))
                    @foreach($marcas as $m)
                        <tr>
                            <td>{{$m->id}}</td>
                            <td>{{$m->nombre}}</td>   
                            <td><a href="" class="btn btn-edit editMarca"><i class="fas fa-edit"></i></a></td>
                            <!--<td><a href="" class="btn btn-edit deleteMarca"><i class="fas fa-trash-alt"></i></a></td>-->
                        </tr>
                    @endforeach
                @endif
        </tbody>
    </table>
</div>