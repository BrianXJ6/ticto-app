@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="mb-4">Olá {{ explode(' ', Auth::user()->name)[0] }}</h1>
    <form action="{{ route() }}" method="post">
        @csrf
        <button class="btn btn-primary" title="Registrar ponto">
            Registrar ponto
        </button>
    </form>
</div>
@endsection
