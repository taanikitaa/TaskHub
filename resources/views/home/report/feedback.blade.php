@extends('layouts.master')
@section('title', 'Feedback Report')
@section('content')
<style>
    .form-control {
        border: 1px solid #ced4da; 
        border-radius: 5px; 
        margin-top: 5px; 
        padding: 8px;
    }

    .form-control:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); 
    }
</style>

<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg">
                        <div class="card-header" style="background-color: #7A8FB2;">
                            <h4 class="mb-0" style="color:white">
                                <i class="fas fa-comment mr-2"></i> Feedback Report
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('feedback.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="id_report">Nama Report:</label>
                                            <select class="form-control" name="id_report" id="id_report" required>
                                                <option value="">Pilih Nama Report</option>
                                                <option value="{{ $report->id }}">{{ $report->nama_report }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_karyawan">Nama Karyawan:</label>
                                            <select class="form-control" name="id_karyawan" id="id_karyawan" required>
                                                <option value="">Pilih Nama Karyawan</option>
                                                @foreach ($karyawans as $karyawan)
                                                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_pembimbing">Nama Pembimbing:</label>
                                            <select class="form-control" name="id_pembimbing" id="id_pembimbing" required>
                                                <option value="">Pilih Nama Pembimbing</option>
                                                @foreach ($pembimbings as $pembimbing)
                                                    <option value="{{ $pembimbing->id }}">{{ $pembimbing->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="feedback">Feedback:</label>
                                            <textarea class="form-control" id="feedback" name="feedback"></textarea>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('home.report.index') }}" class="btn btn-primary btn-block" style="background-color: #7A8FB2;">Kembali</a>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary btn-block" style="background-color: #7A8FB2;">Submit Feedback</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
