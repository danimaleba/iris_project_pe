@extends('layouts.cleanLayout')
@section('title', 'Participantes')
@section('content')
<div class="container justify-content-center align-items-center mt-5" style="min-height: calc(100vh - 88px);">
  <div class="row mb-3">
    <div class="col-2">
      <button type="button" class="btn btn-primary" onclick="window.location='{{ url("participants") }}'">
        Voltar para Participantes
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-6 offset-3 bg-light">
      <form action="/participants/create" method="POST">
        @csrf
        <div class="my-3">
            <input type="text" class="form-control" name="uat" id="uat" placeholder="uat" required>
        </div>
        <div class="my-3">
          <input type="text" class="form-control" name="smartWatch" id="smartWatch" placeholder="Relógio" required>
        </div>
        <div class="my-3">
          <input type="date" class="form-control" name="date_in" id="date_in" value="{{date('Y-m-d')}}"required>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection