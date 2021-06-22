<header>
    <div class="mycontainer flex_center">

        {{-- nav --}}
        <nav class="flex space_bet align_cen">

            {{-- nav_left --}}
            <div class="nav_left flex align_cen">

                {{-- logo --}}
                <div class="nav_logo">
                    <a href={{ route('main') }} id="logo_home" title="Home">
                        <img src="{{ asset('/storage/images/boy.png') }}" alt="logo home">
                    </a>
                </div>

                {{-- ricerca --}}
                <div class="nav_search">
                    <input type="text" placeholder="Cerca un ristorante">

                    <button><i class="fas fa-play"></i></button>
                </div>

                {{-- fine nav_left --}}
            </div>

            {{-- nav_right --}}
            <div class="nav_right flex align_cen">

                {{-- carrello --}}
                <div class="cart relative">
                    <img src="{{ asset('/storage/images/shopping-cart.png') }}" alt="carrello">
                    {{-- aggiungere bollino in absolute con count() di elementi nel carrello --}}
                </div>

                {{-- autenticazione --}}
                <div class="nav_buttons">
                    <div class=" nav_buttons collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">

                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('getLogin') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('getRegistration') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                   document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
                {{-- fine nav_right --}}
            </div>
            {{-- fine nav --}}
        </nav>
        {{-- fine mycontainer --}}
    </div>
</header>
