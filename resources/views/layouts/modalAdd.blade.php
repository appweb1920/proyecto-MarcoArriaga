<!--Modal para añadir producto-->
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
                <div class="md-form mb-3">
                    <input type="texto" name="nombre" class="form-control validate" placeholder="Nombre...">
                </div>

                <div class="form-row mb-3">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Costo</span>
                            </div>
                            <input type="number" step="0.1"  value="" name="costo" class="form-control validate">
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Precio</span>
                            </div>
                            <input type="number" step="0.1"  value="" name="precio" class="form-control validate">
                        </div>
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Categoria</span>
                            </div>
                            <select class="form-control"  name="id_categoria">
                                @if(!is_null($categorias))
                                    @foreach($categorias as $c)
                                        <option value="{{$c->id}}">{{$c->nombre}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Marca</span>
                            </div>
                            <select class="form-control" name="id_marca">
                                @if(!is_null($marcas))
                                    @foreach($marcas as $m)
                                        <option value="{{$m->id}}">{{$m->nombre}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cantidad</span>
                        </div>
                        <input type="number" name="cantidad" class="form-control validate">
                    </div>
                </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-default">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal para añadir categoria-->
<div class="modal fade" id="modalAddCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Nueva categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body mx-3">
                <form action="{{ action('CategoriaController@store') }}" method="POST">
                    @csrf
                    <div class="md-form mb-3">
                        <input type="texto" name="nombre" class="form-control validate" placeholder="Nombre...">
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-default">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal para añadir marca-->
<div class="modal fade" id="modalAddMarca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Nueva marca</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body mx-3">
                <form action="{{ action('MarcaController@store') }}" method="POST">
                    @csrf
                    <div class="md-form mb-3">
                        <input type="texto" name="nombre" class="form-control validate" placeholder="Nombre...">
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-default">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>