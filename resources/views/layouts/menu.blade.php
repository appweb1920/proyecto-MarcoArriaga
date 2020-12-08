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
    <!-- Authentication Links -->
    @guest
        <li class="nav-item text-center">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
        </li>
    @else
        <li class="nav-item dropdown text-center">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>


