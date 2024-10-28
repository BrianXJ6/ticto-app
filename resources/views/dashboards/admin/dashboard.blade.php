@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="#" method="get">
                <div class="row mb-3">
                    <div class="col">
                        <label for="start_date" class="form-label">Data inicial</label>
                        <input id="start_date" name="start_date" type="datetime-local" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="end_date" class="form-label">Data final</label>
                        <input id="end_date" name="end_date" type="datetime-local" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
            <hr>
            @if (count($employees) < 1)
                <div class="alert alert-primary text-center">Nenhum ponto registrado.
        </div>
        @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Idade</th>
                    <th>Nome do Gestor</th>
                    <th>Ponto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employe)
                <tr>
                    <td>{{ $employe->id }}</td>
                    <td>{{ $employe->name }}</td>
                    <td>{{ $employe->position }}</td>
                    <td>{{ $employe->age }}</td>
                    <td>{{ $employe->admin_name }}</td>
                    <td>{{ $employe->point }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
</div>
@endsection
