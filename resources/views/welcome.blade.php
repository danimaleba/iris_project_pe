@extends('layouts.cleanLayout')
@section('title', 'Bem Vindo')
@section('content')
<div class="row">
  <div class="col bg-light">
    <form>
      <div class="my-3">
        <label for="exampleInputEmail1" class="form-label">Login</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
      </div>
      {{-- <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div> --}}
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="password">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary toggle-password" type="button">
              <span class="material-icons">visibility</span>
          </button>
        </div>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('.toggle-password').click(function(){
      $(this).toggleClass('active');
      var input = $($(this).attr('password'));
      if(input.attr('type') === 'password'){
        input.attr('type', 'text');
      } else {
        input.attr('type', 'password');
      }
    });
  });

</script>
@endsection