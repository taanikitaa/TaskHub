@extends('layouts.master')
@section('title', 'Edit Data Jadwal')
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
                            <h4>Edit Data Jadwal</h4>
                        </div>
                        <div class="card-body">
                            <form id="editJadwalForm" action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="{{ $jadwal->tanggal }}">
                                </div>
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                    <input type="text" class="form-control" id="waktu" name="waktu" value="{{ $jadwal->waktu }}">
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $jadwal->tempat }}">
                                </div>
                                <div class="form-group">
                                    <label for="id_karyawan">Karyawan</label>
                                    <select class="form-control" id="id_karyawan" name="id_karyawan">
                                        <option value="">Pilih Karyawan</option>
                                        @foreach($karyawans as $karyawan)
                                            <option value="{{ $karyawan->id }}" {{ $jadwal->id_karyawan == $karyawan->id ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_pembimbing">Pembimbing</label>
                                    <select class="form-control" id="id_pembimbing" name="id_pembimbing">
                                        <option value="">Pilih Pembimbing</option>
                                        @foreach($pembimbings as $pembimbing)
                                            <option value="{{ $pembimbing->id }}" {{ $jadwal->id_pembimbing == $pembimbing->id ? 'selected' : '' }}>{{ $pembimbing->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary" style="background-color: #7A8FB2;">Batal</a>
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
