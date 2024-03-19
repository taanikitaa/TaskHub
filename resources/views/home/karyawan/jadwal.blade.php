@extends('layouts.master')
@section('title', 'Jadwal')
@section('content')
<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        background-color: #365486;
        color: #fff;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.2em;
        margin-bottom: 15px;
    }

    .card-text {
        font-size: 1em;
        margin-bottom: 10px;
    }

    .card-icon {
        font-size: 1.5em;
        color: white;
        margin-right: 10px;
    }
</style>
<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <h2>Jadwal Masuk</h2> 
            <br>
            <div class="row">
                @foreach($karyawanJadwal as $jadwal)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="far fa-calendar-alt card-icon"></i>
                                <span style="color: #fff;">Tanggal: {{ $jadwal->tanggal }}</span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Waktu: {{ $jadwal->waktu }}</p>
                            <p class="card-text">Tempat: {{ $jadwal->tempat }}</p>
                            <p class="card-text">Pembimbing: {{ $jadwal->pembimbing->nama }}</p> 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
