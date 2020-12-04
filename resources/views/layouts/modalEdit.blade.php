<!--Modal para editar producto-->
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
                <div class="modal-body mx-3">
                    <input type="hidden"  value="" name="id" id="id-prod">
                    <div class="md-form mb-3">
                        <input type="texto" name="nombre" id="nombre" class="form-control validate" placeholder="Nombre...">
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Costo</span>
                                </div>
                                <input type="number" step="0.1"  id="costo" name="costo" class="form-control validate">
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Precio</span>
                                </div>
                                <input type="number" step="0.1"  id="precio" name="precio" class="form-control validate">
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Categoria</span>
                                </div>
                                <select class="form-control"  id="id_categoria" name="id_categoria">
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
                                <select class="form-control" id="id_marca" name="id_marca">
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
                            <input type="number" id="cantidad" name="cantidad" class="form-control validate">
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" id="actualiza" class="btn btn-default" >Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal para editar categoria-->
<div class="modal fade" id="modalEditCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Editar Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/categoria" id="editFormCat" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body mx-3">
                    <input type="hidden"  value="" name="id" id="id-cat">
                    <div class="md-form mb-3">
                        <input type="texto" name="nombre" id="nombreCat" class="form-control validate" placeholder="Nombre...">
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" id="actualizaCat" class="btn btn-default" >Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal para editar marca-->
<div class="modal fade" id="modalEditMarca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Editar Marca</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/marca" id="editFormMarca" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body mx-3">
                    <input type="hidden"  value="" name="id" id="id-cat">
                    <div class="md-form mb-3">
                        <input type="texto" name="nombre" id="nombreMarca" class="form-control validate" placeholder="Nombre...">
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" id="actualizaCat" class="btn btn-default" >Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>