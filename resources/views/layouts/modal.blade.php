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