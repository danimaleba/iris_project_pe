@extends('layouts.cleanLayout')
@section('title', 'Registre-se')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 40px);">
  <div class="row">
    <div class="col bg-light">
      <form>
        <div class="my-3">
          <input type="email" class="form-control" id="email" placeholder="e-mail">
        </div>
        <div class="my-3">
          <input type="phone" class="form-control" id="phone" placeholder="tefone">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="password">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary toggle-password" type="button" onclick="changePasswordVisibility()">
                <span id="password-visibility-btn" class="material-icons align-middle">visibility</span>
            </button>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="confirmPassword" placeholder="confirme password">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary toggle-password" type="button" onclick="changeConfirmPasswordVisibility()">
                <span id="confirm-password-visibility-btn" class="material-icons align-middle">visibility</span>
            </button>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
      </form>
    </div>
    <a href="/login">login</a>
  </div>
</div>
<script>
  function changePasswordVisibility() {
    let btn = document.getElementById("password-visibility-btn");
    let input = document.getElementById("password");
    btn.textContent = btn.textContent == "visibility" ? "visibility_off" : "visibility";
    input.type = input.type == "password" ? "text" : "password";
  }
  function changeConfirmPasswordVisibility() {
    let btn = document.getElementById("confirm-password-visibility-btn");
    let input = document.getElementById("confirmPassword");
    btn.textContent = btn.textContent == "visibility" ? "visibility_off" : "visibility";
    input.type = input.type == "password" ? "text" : "password";
  }
</script>
@endsection