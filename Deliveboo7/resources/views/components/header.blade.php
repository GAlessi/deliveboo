<header>
    <div class="mycontainer flex_center">

        {{-- nav --}}
        <nav class="flex space_bet align_cen">

            {{-- nav_left --}}
            <div class="nav_left flex align_cen">

                {{-- logo --}}
                <div class="nav_logo flex_center">
                    <a href={{ route('main') }} title="Home">
                        <h3>Deliveboo!</h3>
                    </a>
                </div>
                {{-- fine nav_left --}}
            </div>

            {{-- nav_right --}}
            <div class="nav_right flex_col align_cen">

                @guest

                    <h6>Sei un ristoratore?</h6>

                @endguest

                {{-- autenticazione --}}
                <div class="nav_buttons">
                    <div class="nav_buttons collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto">

                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('getLogin') }}">Accedi</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('getRegistration') }}">Registrati</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
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
    {{-- fine #app --}}
    {{-- </div> --}}
</header>
