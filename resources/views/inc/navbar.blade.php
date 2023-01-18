<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand text-left" href="/">
           Trueque
        </a>

        <form class="form-inline myform" action="/buscar" method="POST" role="buscar">
            @csrf

            <div class="input-group" data-toggle="tooltip" data-placement="top" title="titulo">
                <input name="titulo" value="{{$titulo ?? ''}}" type="text" class="form-control" placeholder="Buscar" aria-describedby="basic-addon1">
            </div>

            <select  name="categoria" data-toggle="tooltip" data-placement="top" title="seleccionar categoria"
                     class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                <option  value="">Todas las Categorías</option>
                @foreach ($categorias as $categoria)
                    <option @if(!empty($categoria_busqueda) )
                            @if($categoria_busqueda->cat_id ==  $categoria->cat_id)
                            selected="selected"
                            @endif
                            @endif
                            value="{{ $categoria->cat_id}}">{{ $categoria->cat_categoria }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>



        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarte</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>



                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::id()!=1)
                                    <a class="dropdown-item" href="/mis_publicaciones/{{ Auth::id() }}">Mis Publicaciones</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>



                @endguest
                @if(Auth::id()!=1)
                <li>
                    <a class="nav-link" href="/publicar">Publicar</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
