@extends('layouts.cleanLayout')
@section('title', 'Login')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 40px);">
  <div class="row">
    <div class="col bg-light">
      <form>
        <div class="my-3">
          <label for="exampleInputEmail1" class="form-label">Login</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="password">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary toggle-password" type="button" onclick="changePasswordVisibility()">
                <span id="password-visibility-btn" class="material-icons align-middle">visibility</span>
            </button>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
      </form>
    </div>
    <a href="/register">registre-se</a>
  </div>
</div>
<script>
  function changePasswordVisibility() {
    let btn = document.getElementById("password-visibility-btn");
    let input = document.getElementById("password");
    console.log(btn.textContent);
    btn.textContent = btn.textContent == "visibility" ? "visibility_off" : "visibility";
    input.type = input.type == "password" ? "text" : "password";
  }
</script>
@endsection