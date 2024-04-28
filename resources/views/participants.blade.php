@extends('layouts.cleanLayout')
@section('title', 'Participantes')
@section('content')
<div class="d-block">
    <h1 class="text-light">
        participantes
    </h1>

    @foreach($participants as $participant)
        <pre class="text-light">
            {{ $participant }}
        </pre>
        <br/>
    @endforeach
</div>

@endsection