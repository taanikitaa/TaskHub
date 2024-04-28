@extends('layouts.master')

@section('title', 'Absensi')

@section('content')
<style>
    .form-control {
        border: 1px solid #ced4da; 
        border-radius: 5px; 
        margin-top: 5px; 
        padding: 8px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card-header {
        background-color: #3A5169;
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .card-body {
        color: #3A5169;
    }

    .btn-primary {
        background-color: #3A5169;
        color: white;
        border-radius: 5px;
        padding: 8px 20px;
        border: none;
    }

    .btn-primary:hover {
        background-color: #5F7D95;
    }
</style>
@can('manage report task')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Absen Karyawan</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('absensi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="karyawan_id" class="font-weight-bold">Karyawan:</label>
                            <select name="karyawan_id" id="karyawan_id" class="form-control">
                                @foreach ($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="font-weight-bold">Keterangan:</label>
                            <select name="keterangan" id="keterangan" class="form-control">
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Masuk">Masuk</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="font-weight-bold">Tanggal:</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Absen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan
@can('manage karyawan data')
<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4 style="color: white;">Kelola Data Absensi</h4>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Karyawan</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($absensis as $absensi)
                                    <tr>
                                        <td>{{ $absensi->id }}</td>
                                        <td>{{ $absensi->karyawan->nama }}</td>
                                        <td>{{ $absensi->keterangan }}</td>
                                        <td>{{ $absensi->tanggal }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endcan
@endsection
