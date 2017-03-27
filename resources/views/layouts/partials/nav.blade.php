<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary mb-2">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Envelopes" height="30">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ (Request::is('/')?'active':'') }}">
                    <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ (Request::is('categories')?'active':'') }}">
                    <a class="nav-link" href="{{ url('categories') }}">{{ __ ('Categorías') }}</a>
                </li>
                <li class="nav-item {{ (Request::is('envelopes')?'active':'') }}">
                    <a class="nav-link" href="{{ url('envelopes') }}">{{ __ ('Sobres') }}</a>
                </li>
                <li class="nav-item {{ (Request::is('budgets')?'active':'') }}">
                    <a class="nav-link" href="{{ url('budgets') }}">{{ __ ('Presupuestos') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Ingreso') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                {{ __('Salir') }}
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>