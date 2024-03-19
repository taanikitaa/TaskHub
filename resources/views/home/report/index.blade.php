@extends('layouts.master')
@section('title', 'Kelola Data Report')
@section('content')
<style>
    .button-group {
    margin-bottom: 5px; 
    
}
.report-card {
        margin-bottom: 20px;
        max-width: 400px;
    }

    .report-card .card-body {
        padding: 20px;
    }

    .report-card .card-header {
        background-color: #365486;
        color: white;
        padding: 10px 20px;
    }

    .report-card .card-header h5 {
        margin-bottom: 0;
    }

    .report-card .btn {
        margin-right: 10px;
    }

</style>
@can('manage report task data')
<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            @can('manage report task data')
                            <h4>Kelola Data Report</h4>
                            @endcan
                            @can('manage report task')
                            <h4>Report Task</h4>
                            @endcan
                        </div>
                        <div class="card-body">
                        <table id="example" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Report</th>
                                        <th>Tanggal Report</th>
                                        <th>Dokumen</th>
                                        <th>Keterangan</th>
                                        <th>ID Karyawan</th>
                                        <th>ID Pembimbing</th>
                                        <th>ID Task</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reports as $report)
                                    <tr>
                                        <td>{{ $report->id }}</td>
                                        <td>{{ $report->nama_report }}</td>
                                        <td>{{ $report->tanggal_report }}</td>
                                        <td>{{ $report->dokumen }}</td>
                                        <td>{{ $report->link_video }}</td>
                                        <td>{{ $report->id_karyawan }}</td>
                                        <td>{{ $report->id_pembimbing }}</td>
                                        <td>{{ $report->id_task }}</td>
                                        <td>{{ $report->status }}</td>
                                        <td>
                                            @can('manage report task')
                                            <a href="{{ route('report.edit', $report->id) }}" class="btn btn-warning" style="background-color: #7A8FB2;">Edit</a>
                                            <form action="{{ route('report.destroy', $report->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="background-color: #365486;" onclick='return confirm("Apakah anda yakin untuk menghapus?")'>Delete</button>
                                            </form>
                                            @endcan
                                            @can('manage report task data')
                                            <a href="{{ route('report.show', $report->id) }}" class="btn btn-warning" style="background-color: #7A8FB2;">View</a>
                                            @endcan
                                        </td>
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

@can('manage report task')

<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <div class="row justify-content-center">
                @foreach($reports as $report)
                <div class="col-lg-4">
                    <div class="card report-card shadow-lg">
                        <div class="card-header">
                            <h5 style="color: white"><i class="fas fa-file-alt"></i> {{ $report->nama_report }}</h5>                        </div>
                        <div class="card-body">
                            <p>Tanggal Report: {{ $report->tanggal_report }}</p>
                            <p>Dokumen: {{ $report->dokumen }}</p>
                            <p>Keterangan: {{ $report->link_video }}</p>
                            <p>ID Karyawan: {{ $report->id_karyawan }}</p>
                            <p>ID Pembimbing: {{ $report->id_pembimbing }}</p>
                            <p>ID Task: {{ $report->id_task }}</p>
                            <p>Status: {{ $report->status }}</p>
                            @can('manage report task')
                            <a href="{{ route('report.edit', $report->id) }}" class="btn btn-warning" style="background-color: #7A8FB2;">Edit</a>
                            <form action="{{ route('report.destroy', $report->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color: #365486;" onclick='return confirm("Apakah anda yakin untuk menghapus?")'>Delete</button>
                            </form>
                            @endcan
                            @can('manage report task data')
                            <a href="{{ route('report.show', $report->id) }}" class="btn btn-warning" style="background-color: #7A8FB2;">View</a>
                            @endcan
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endcan

@endsection
