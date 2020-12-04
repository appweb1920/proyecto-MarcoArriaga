<ul class="nav justify-content-center">
    <li class="nav-item text-center">
        <a class="nav-link active" href="\inventario">Todos</a>
    </li>
    <li class="nav-item dropdown text-center">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Categorias</a>
        <div class="dropdown-menu">
            @if(!is_null($categorias))
                @foreach($categorias as $c)
                    <a class="dropdown-item" href="\categorias\{{$c->id}}">{{$c->nombre}}</a>
                @endforeach
            @endif
        </div>
    </li>
    <li class="nav-item dropdown text-center">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Marcas</a>
        <div class="dropdown-menu">
            @if(!is_null($marcas))
                @foreach($marcas as $m)
                    <a class="dropdown-item" href="\marcas\{{$m->id}}">{{$m->nombre}}</a>
                @endforeach
            @endif
        </div>
    </li>
</ul>