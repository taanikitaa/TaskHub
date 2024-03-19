@extends('layouts.app')

@section('content')
<style>
    body{
    background: #fff !important;
    font-family: 'Muli', sans-serif;
    
}
h1{
    color: #fff;
    padding-bottom: 2rem;
    font-weight: bold;
}
a{
    color: #333;
}
.form-control:focus {
    color: #000;
    background-color: #fff;
    border:2px solid #E8D426;
    outline: 0;
    box-shadow: 5px;
}
.block {
    display: block;
    width: 90%; 
    border: none;
    background-color:  #fff; 
    color: #000; 
    padding: 12px 20px; 
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    border-radius: 5px;
    margin: auto;
}


</style>
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body" style="background-color: #B4D4FF;">
                <div class="mb-3 text-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" style="max-width: 100px;">
                </div>
                <br>
                <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Konfirmasi Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <br>
                        <div class="form-group pt-1">
                            <button class="block" type="submit">{{ __('Daftar') }}</button>
                        </div>
                        <br>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

