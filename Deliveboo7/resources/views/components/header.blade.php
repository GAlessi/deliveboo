
<header>


  <div class="mycontainer">

        <nav class="flex space_bet">

            <div class="nav_logo">
                <a href={{route('main')}}>DELIVEBOO</a>
            </div>

            <div class="nav_buttons">

              <div class=" nav_buttons collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">

                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                  </ul>
              </div>
            </div>
        </nav>

        <div class="jumbo">
            <p id="jumbo_text">
                I piatti che ami, a domicilio.
            </p>
            <img id="casa" src="{{asset ('/storage/images/casa.png')}}" alt="">
            <img class="animate__fadeInRight" id="boy-img" src="{{asset ('/storage/images/boy.png')}}">
            <input type="text" name="" placeholder='Cerca un ristorante'>
            <button type="button" name="button">cerca</button>
        </div>
  </div>
</header>
