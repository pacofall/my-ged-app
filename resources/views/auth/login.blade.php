@extends("layouts.base")

@section('title', 'Connexion')

@section("content")

<div class="login-container">
  <div class="text-center">
    <img src="{{ asset('images/logo-abib-soft.png') }}" width="200px" alt="Logo" class="mb-4">
  </div>
    @error("error")
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @enderror



  <form class="login-form" method="post">
      @csrf
      <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input name="email" type="email" class="form-control" id="email" placeholder="Username@gmail.com" value="{{ @old('email')}}">
          @error("email")
          {{ $message }}
          @enderror
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input name="password"  type="password" class="form-control" id="password">
          @error("password")
          {{ $password }}
          @enderror
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
      <div class="mt-3 text-center">
          <a href="#">Signup</a>
          <span>|</span>
          <a href="#">Forgot Password?</a>
      </div>
  </form>
</div>

@endsection
