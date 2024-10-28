@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atualizar dados</div>
                <div class="card-body">
                    <form action="{{ route('actions.admin.employees.update', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nome completo:</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" maxlength="100" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-mail:</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" maxlength="100">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cpf" class="col-md-4 col-form-label text-md-end">CPF:</label>
                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ $user->cpf }}" required autocomplete="cpf" minlength="11" maxlength="11">
                                @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birth-date" class="col-md-4 col-form-label text-md-end">Data de nascimento:</label>
                            <div class="col-md-6">
                                <input id="birth-date" type="date" class="form-control @error('birth-date') is-invalid @enderror" name="birth-date" value="{{ $user->birth_date->format('Y-m-d') }}" required autocomplete="birth-date">
                                @error('birth-date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="position" class="col-md-4 col-form-label text-md-end">Cargo:</label>
                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $user->position }}" required autocomplete="position" maxlength="100">
                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zip-code" class="col-md-4 col-form-label text-md-end">CEP:</label>
                            <div class="col-md-6">
                                <input id="zip-code" type="text" class="form-control @error('zip-code') is-invalid @enderror" name="zip-code" value="{{ $user->zip_code }}" required autocomplete="zip-code" minlength="8" maxlength="8" onkeyup="triggerZip(event)">
                                @error('zip-code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="street" class="col-md-4 col-form-label text-md-end">Logradouro:</label>
                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ $user->street }}" required autocomplete="street" maxlength="100">
                                @error('street')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address-number" class="col-md-4 col-form-label text-md-end">Número:</label>
                            <div class="col-md-6">
                                <input id="address-number" type="text" class="form-control @error('address-number') is-invalid @enderror" name="address-number" value="{{ $user->address_number }}" autocomplete="address-number" maxlength="5">
                                @error('address-number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="district" class="col-md-4 col-form-label text-md-end">Bairro:</label>
                            <div class="col-md-6">
                                <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ $user->district }}" required autocomplete="district" maxlength="50">
                                @error('district')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">Cidade:</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}" required autocomplete="city" maxlength="50">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="uf" class="col-md-4 col-form-label text-md-end">UF:</label>
                            <div class="col-md-6">
                                <input id="uf" type="text" class="form-control @error('uf') is-invalid @enderror" name="uf" value="{{ $user->uf }}" required autocomplete="uf" minlength="2" maxlength="2">
                                @error('uf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Atualizar dados</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@vite(['resources/js/Pages/Register.js'])
@endpush
