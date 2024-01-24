@extends('layouts.app')
@section('content')
    <section>
        <div class="container py-3">
            <h1 class="text-white">Ciao Admin</h1>
            <p>
                Hai ricevuto un messaggio, ecco i dettagli: <br>
                Nome : {{ $lead->name }} <br>
                Email : {{ $lead->email }} <br>
                Address : {{ $lead->address }} <br>
                Message : {{ $lead->message }} <br>
            </p>
        </div>
    </section>
@endsection
