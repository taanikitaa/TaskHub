@extends('layouts.master')
@section('title', 'Detail Report')
@section('content')
<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg">
                        <div class="card-header" style="background-color: #7A8FB2;">
                            <h4 class="mb-0" style="color:white">
                                <i class="fas fa-file-alt mr-2"></i> Detail Report
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <strong class="detail-label">ID:</strong>
                                        <span>{{ $report->id }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <strong class="detail-label">Nama Report:</strong>
                                        <span>{{ $report->nama_report }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <strong class="detail-label">Tanggal Report:</strong>
                                        <span>{{ $report->tanggal_report }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <strong class="detail-label">Dokumen:</strong>
                                        <span>{{ $report->dokumen }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <strong class="detail-label">Link Video:</strong>
                                        <span>{{ $report->link_video }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <strong class="detail-label">ID Karyawan:</strong>
                                        <span>{{ $report->karyawan->nama }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <strong class="detail-label">ID Pembimbing:</strong>
                                        <span>{{ $report->pembimbing->nama }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <strong class="detail-label">ID Task:</strong>
                                        <span>{{ $report->task->nama_task }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <strong class="detail-label">Status:</strong>
                                        @if($report->status == 'selesai')
                                            <span class="badge badge-success" style="color: green">{{ $report->status }}</span>
                                        @else
                                            <span class="badge badge-danger" style="color: red">{{ $report->status }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <a href="{{ route('report.index') }}" class="btn btn-primary" style="background-color: #7A8FB2;">Kembali</a>
                            <a href="{{ route('feedback.create', ['id' => $report->id]) }}" class="btn btn-primary" style="background-color: #7A8FB2;">Feedback</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
