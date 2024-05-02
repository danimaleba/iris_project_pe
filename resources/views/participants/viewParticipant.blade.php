@extends('layouts.cleanLayout')
@section('title', 'Participantes')
@section('content')
<div class="container justify-content-center align-items-center mt-5" style="height: calc(100vh - 88px);">
  <div class="row mb-3">
    <div class="col-2">
      <button type="button" class="btn btn-primary" onclick="window.location='{{ url("participants") }}'">
        Voltar para Participantes
      </button>
    </div>
  </div>
  @if(session('msg'))
  <div class="row mb-3">
    <div class="col-12 bg-success">
      <p class="text-center align-middle m-0 p-2">{{session('msg')}}</p>
    </div>
  </div>
  @endif
  <div class="row">
    <div class="col-6 offset-3 bg-light">
      <p class="m-0"><span class="fw-bold">Participante ID:</span> {{$participant->id}}</p>
      <p class="m-0"><span class="fw-bold">Data de início:</span> {{$participant->date_in}}</p>
      <p class="m-0"><span class="fw-bold">Data de finalização:</span> {{$participant->date_out}}</p>
      <div class="overflow-auto" style="max-height:620px">
      </div>
    </div>
  </div>
</div>
@endsection