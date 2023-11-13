<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand mb-0 h1" href="/">ABIB SOFT Sass v1.0</a>
    <div class="d-flex align-items-center">
      <a href="#" class="me-3">Platform</a>
      <a href="#" class="me-3">Solution</a>
      <a href="#" class="me-3">Partner</a>
      <a href="{{ route('settings-page') }}" class="me-3">Support</a>

        @auth
        <span class="badge badge-light">{{Auth::user()->name }} |</span>

        <form class="mb-0" action="{{ route("auth.logout") }}" method="post">
        @method("delete")
        @csrf
        <button class="btn btn-link text-info">log out</button>
        </form>
        @endauth
        @guest
        <a href="{{ route("auth-login-page") }}" class="btn btn-outline-light">Sign In</a>
        @endguest

    </div>
  </div>
</nav>
