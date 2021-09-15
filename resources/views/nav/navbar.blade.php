<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Vetro Media BackEnd Assessment</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Posts<span class="sr-only">(current)</span></a>
        </li>
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
               <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault();
                                  this.closest('form').submit();">
                      {{ __('Log Out') }}
               </a>
              </form>
              </div>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.register.view')}}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.login.view')}}">Login</a>
          </li>
        @endauth
      </ul>
    </div>
  </nav>
      





