@extends('layouts.master')
@section('title', 'Edit Data Report')
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
                            <h4>Edit Data Report</h4>
                        </div>
                        <div class="card-body">
                            <form id="editReportForm" action="{{ route('report.update', $report->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama_report">Nama Report</label>
                                    <input type="text" class="form-control" id="nama_report" name="nama_report" value="{{ $report->nama_report }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_report">Tanggal Report</label>
                                    <input type="date" class="form-control" id="tanggal_report" name="tanggal_report" value="{{ $report->tanggal_report }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_report">Status</label>
                                    <input type="date" class="form-control" id="status" name="status" value="{{ $report->status }}">
                                </div>
                                <div class="form-group">
                                    <label for="id_karyawan">Karyawan</label>
                                    <select class="form-control" id="id_karyawan" name="id_karyawan">
                                        <option value="">Pilih Karyawan</option>
                                        @foreach($karyawans as $karyawan)
                                            <option value="{{ $karyawan->id }}" {{ $report->id_karyawan == $karyawan->id ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_pembimbing">Pembimbing</label>
                                    <select class="form-control" id="id_pembimbing" name="id_pembimbing">
                                        <option value="">Pilih Pembimbing</option>
                                        @foreach($pembimbings as $pembimbing)
                                            <option value="{{ $pembimbing->id }}" {{ $report->id_pembimbing == $pembimbing->id ? 'selected' : '' }}>{{ $pembimbing->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_task">Task</label>
                                    <select class="form-control" id="id_task" name="id_task">
                                        <option value="">Pilih Task</option>
                                        @foreach($tasks as $task)
                                            <option value="{{ $task->id }}" {{ $report->id_task == $task->id ? 'selected' : '' }}>{{ $task->nama_task }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <a href="{{ route('report.index') }}" class="btn btn-secondary" style="background-color: #7A8FB2;">Batal</a>
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
