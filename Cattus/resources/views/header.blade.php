<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
      <img src="{{ asset('cat.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
      <h1>Cattus</h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{route('welcome')}}">Home</a>
        </li>
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route('cat')}}">Upload your cat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('myprofile')}}">My profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Logout</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('registration')}}">Registration</a>
          </li>
        @endauth
      </ul>
      <span class="navbar-text">
        @auth
          {{auth()->user()->name}}
        @endauth
      </span>
    </div>
  </div>
</nav>