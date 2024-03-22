@extends('layouts.master')
@section('title', 'Edit Data Pembimbing')
@section('content')

<style>
        .form-control {
        border: 1px solid #ced4da; 
        border-radius: 5px; 
        margin-top: 5px; 
        padding: 8px;
    }
</style>

<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Edit Data Pembimbing</h4>
                        </div>
                        <div class="card-body">
                            <form id="editPembimbingForm" action="{{ route('pembimbing.update', $pembimbing->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama_pembimbing">Nama Pembimbing</label>
                                    <input type="text" class="form-control" id="nama_pembimbing" name="nama_pembimbing" value="{{ $pembimbing->nama_pembimbing }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $pembimbing->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{ $pembimbing->password }}">
                                </div>
                                <br>
                                <a href="{{ route('pembimbing.index') }}" class="btn btn-secondary" style="background-color: #7A8FB2;">Batal</a>
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
