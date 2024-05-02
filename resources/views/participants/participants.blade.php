@extends('layouts.cleanLayout')
@section('title', 'Participantes')
@section('content')
<div class="container justify-content-center align-items-center mt-5" style="min-height: calc(100vh - 88px)">
  <div class="row justify-content-end">
    <div class="col-2">
      <button type="button" class="btn btn-primary" onclick="window.location='{{ url("participants/create") }}'">
        Novo Participante
      </button>
    </div>
  </div>
  <div class="row">
    <div class=" col-12 text-light">
      PARTICIPANTES:
    </div>
  </div>  
  <div class="row">
    @foreach($participants as $participant)
      <button class="btn col-1 bg-light text-center m-1" onclick="window.location='{{ url("participants/$participant->id") }}'">
        ID:  {{$participant->id}}
      </button>
    @endforeach
  </div>
</div>

@endsection