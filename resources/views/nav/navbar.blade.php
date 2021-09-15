<div class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="/" class="navbar-brand">Vetro Media BackEnd Assessment</a>
        <ul class="menu">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('posts.index')}}">Posts</a></li>
            <!-- if user is logged in it hides login and register and display user name route logout -->
            @auth
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                     <a href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                     </a>
                    </form>
                </li>
                <li><a href="#"  style="color:#00ff00;">{{ Auth::user()->name}}</a></li>
              @else
                <li><a href="{{route('user.register.view')}}">Register</a></li>
                <li><a href="{{route('user.login.view')}}">Login</a></li>
            @endauth
            
        </ul>
    </div>
</div>