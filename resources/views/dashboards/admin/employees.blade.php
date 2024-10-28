@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('admin.employees.new') }}" class="btn btn-primary mb-3">Novo funcionário</a>

    @if (count($employees) < 1)
        <div class="alert alert-primary text-center">Nenhum funcionário registrado.
</div>
@else
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>CPF</th>
            <th>Nome</th>
            <th>position</th>
            <th width='1' class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employe)
        <tr>
            <td>{{ $employe->id }}</td>
            <td>{{ $employe->cpf }}</td>
            <td>{{ $employe->name }}</td>
            <td>{{ $employe->position }}</td>
            <td>
                <div class="d-inline-flex align-items-center gap-2">
                    <a href="{{ route('admin.employees.update', ['user' => $employe->id]) }}" class="btn btn-sm btn-primary">Atualizar</a>
                    <form action="{{ route('actions.admin.employees.delete', ['user' => $employe->id]) }}" method="post">
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
</div>
@endsection
