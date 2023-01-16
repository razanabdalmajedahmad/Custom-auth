
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">@if(Auth::check()) {{Auth::user()->name}} @else Custom auth @endif</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          @if(Auth::check())
              <li class="nav-item">
                <a @if(Route::current()->getName() == 'home') class="nav-link active" @else  class="nav-link" @endif   href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item">
                  <a     class="nav-link"  href="{{route('logout')}}">Logout</a>
              </li>
          @else
              <li class="nav-item">
                <a @if(Route::current()->getName() == 'login') class="nav-link active" @else  class="nav-link" @endif href="{{route('login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a  @if(Route::current()->getName() == 'register') class="nav-link active" @else  class="nav-link" @endif href="{{route('register')}}">Register</a>
              </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
