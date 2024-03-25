@extends('layouts.master')
@section('title', 'Feedback')
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
        background: linear-gradient(to right, #365486, #185C8F);
        color: #fff;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 15px;
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
            <h2>Feedback Report</h2> 
            <br>
            <div class="row">
                @foreach($feedbacks as $feedback)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="far fa-comment card-icon"></i>
                                <span style="color: #fff;">Feedback dari "{{ $feedback->report ? $feedback->report->nama_report : 'Report Tidak Ditemukan' }}"</span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Karyawan:</strong> {{ $feedback->karyawan ? $feedback->karyawan->nama : 'Belum ditentukan' }}</p>
                            <p class="card-text"><strong>Pembimbing:</strong> {{ $feedback->pembimbing ? $feedback->pembimbing->nama : 'Belum ditentukan' }}</p>
                            <p class="card-text"><strong>Feedback:</strong> {{ $feedback->feedback }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
