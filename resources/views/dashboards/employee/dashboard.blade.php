@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="mb-4">Olá {{ explode(' ', Auth::user()->name)[0] }}</h1>
    <form action="{{ route('actions.employee.point.register') }}" method="post" class="mb-4">
        @csrf
        <button class="btn btn-primary" title="Registrar ponto">
            Registrar ponto
        </button>
    </form>
    @if (count($list_points) < 1)
        <div class="alert alert-primary">Nenhum ponto registrado.</div>
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Últimos pontos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_points as $item)
                <tr>
                    <td>{{ $item->point }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
