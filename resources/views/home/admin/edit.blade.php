@extends('layouts.master')
@section('title', 'Edit Data Admin')
@section('content')

<style>
    .form-control {
        border: 1px solid #ced4da; 
        border-radius: 5px; 
        margin-top: 5px; 
    }
</style>
<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Edit Data Admin</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <br>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary" style="background-color: #7A8FB2;">Batal</a>
                                <button type="submit" class="btn btn-primary" style="background-color: #365486;">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
