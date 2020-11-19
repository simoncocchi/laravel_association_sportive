<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        background-color: #111;
    }

    .active {
        background-color: #4CAF50;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
        color: gray;
    }
</style>

<ul>
    <li><a href="{{route('accueil')}}">Accueil</a></li>
    <li><a href="#news" class="disabled">Contact</a></li>

    @if (Route::has('login'))

        @auth

            <li><a class="disabled">{{ Auth::user()->name }}</a></li>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                    {{ __('Logout') }}</a></li>
            </form>
            <li><a href="{{ route('licenses.index') }}">Licenses</a></li>
            <li style="float:right"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        @else
            <li style="float:right"><a href="{{ route('login') }}">Log in</a></li>
            @if (Route::has('register'))
                <li style="float:right"><a href="{{ route('register') }}">Register</a></li>
                @endif
                @endif
                </div>
        @endif

        <!--  <li style="float:right"><a class="disabled" href="#about">Log in</a></li>
            <li style="float:right"><a href="/users/create">Register</a></li> -->

</ul>

