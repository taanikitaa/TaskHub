@extends('layouts.master')
@section('title', 'Absen')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5 class="text-white mb-0">Absen</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('absen.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Nama </label>
                            <select name="karyawan_id" id="karyawan_id" class="form-select">
                                @foreach($karyawan as $kar)
                                <option value="{{ $kar->id }}">{{ $kar->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <select name="keterangan" id="keterangan" class="form-select">
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="masuk">Masuk</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Absen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
