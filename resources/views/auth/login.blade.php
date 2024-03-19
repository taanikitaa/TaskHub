@extends('layouts.app')

@section('content')
<style>
    body {
        background: #fff !important;
        font-family: 'Muli', sans-serif;
    }

    h1 {
        color: #fff;
        padding-bottom: 2rem;
        font-weight: bold;
    }

    a {
        color: #333;
    }

    .form-control:focus {
        color: #000;
        background-color: #fff;
        border: 2px solid #E8D426;
        outline: 0;
        box-shadow: 5px;
    }

    .block {
        display: block;
        width: 90%;
        border: none;
        background-color: #fff;
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
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="invalid-feedback">
                                Please enter your password.
                            </div>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link ml-auto" href="{{ route('password.request') }}" style="color: #333; margin-left: 310px;">Forgot Your Password?</a>
                            @endif
                        </div>


                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <div class="form-group pt-1">
                            <button class="block" type="submit">Masuk</button>
                        </div>
                        <p class="mt-3 text-center">
                            <span class="text-muted">Tidak punya akun?</span>
                            <a href="{{ route('register') }}">Daftar</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
