@extends('skeleton')

@section('title', 'Főoldal')

@section('content')


    <div class="card mb-3">
        <div class="card-body" style="text-align: center;">
            <img src="{{ asset('kepek/404beer.jpg') }}" class="rounded img-fluid" alt="404" style="max-width: 80vmin">
            <p class="card-text">Sajnos ez az oldal még nem létezik, vagy karbantartás alatt van.</p>
            <p class="card-text"><small class="text-body-secondary">
                    Ha szeretnéd hogy hamarabb elkészüljön, segíts.
                </small></p>
        </div>
    </div>

@endsection