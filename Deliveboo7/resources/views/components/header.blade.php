

<header>




  <div class="mycontainer">

        <nav class="flex space_bet">

            <div class="nav_logo">
                <a href={{route('main')}}>DELIVEBOO</a>
            </div>

            <div class="nav_buttons">

                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

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
