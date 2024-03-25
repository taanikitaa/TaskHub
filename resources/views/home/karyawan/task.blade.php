@extends('layouts.master')
@section('title', 'Task Karyawan')
@section('content')
    <style>
        .tambah-modal {
        display: none;
        position: fixed;
        z-index: 1050; 
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: auto; 
    }

    .tambah-modal-content {
        background-color: #fff;
        margin: 2% auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        max-width: 500px;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .form-group label {
        margin-bottom: 5px; 
    }

    .form-control {
        border: 1px solid #ced4da; 
        border-radius: 5px; 
        margin-top: 5px; 
        padding: 8px;
    }
    .book-card {
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .book-card:hover {
        transform: translateY(-5px);

    }
    .card-title .fas {
            margin-left: 180px;
            color: white ; 
        }
    
    .card-header {
        background-color: #365486;
        color: #fff;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
</style>
<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <h2>Task Karyawan</h2> 
            <br>
            <div class="row">
                @foreach($karyawanTasks as $task)
                <div class="col-md-4 mb-4">
                    <div class="card book-card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <span style="color: #fff;">Task: {{ $task->nama_task }}</span>
                            
                        </h5>
                    </div>
                     
                        <div class="card-body">
                            <p class="card-text">Deadline: {{ $task->deadline }}</p>
                            <p class="card-text">Level: {{ $task->level }}</p>
                            <p class="card-text">Pembimbing: {{ $task->pembimbing->nama }}</p> 
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                        @if($task->report)
                        <span class="badge badge-success" style="color: green">{{ $task->report->status }}</span>
                        @else
                        <a href="#" id="open-modal" class="btn btn-primary" style="background-color: #365486;"> Report</a>
                        @endif
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<div class="tambah-modal" id="tambah-modal">
    <div class="tambah-modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahModalLabel"><i class="fas fa-plus-circle mr-2"></i> Tambah Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="addReportForm" method="POST" action="{{ route('task.report') }}">
                @csrf
                <div class="form-group">
                    <label for="nama_report">Nama Report</label>
                    <input type="text" class="form-control" id="nama_report" name="nama_report" placeholder="Masukkan nama report">
                </div>
                <div class="form-group">
                    <label for="tanggal_report">Tanggal Report</label>
                    <input type="date" class="form-control" id="tanggal_report" name="tanggal_report">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="belum selesai">Belum Selesai</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="karyawan">Karyawan</label>
                    <select class="form-control" id="id_karyawan" name="id_karyawan">
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_pembimbing">Pembimbing</label>
                    <select class="form-control" id="id_pembimbing" name="id_pembimbing">
                        @foreach($pembimbings as $pembimbing)
                            <option value="{{ $pembimbing->id }}">{{ $pembimbing->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_task">Task</label>
                    <select class="form-control" id="id_task" name="id_task">
                        @foreach($tasks as $task)
                            <option value="{{ $task->id }}">{{ $task->nama_task }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dokumen">Dokumen</label>
                    <input type="file" class="form-control" id="dokumen" name="dokumen">
                </div>
                <div class="form-group">
                    <label for="link_video">Link Video</label>
                    <input type="text" class="form-control" id="link_video" name="link_video" placeholder="Masukkan link video">
                </div>
                <br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #365486;">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("open-modal").addEventListener("click", function() {
        document.getElementById("tambah-modal").style.display = "block";
    });

    document.querySelector(".close").addEventListener("click", function() {
        document.getElementById("tambah-modal").style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target == document.getElementById("tambah-modal")) {
            document.getElementById("tambah-modal").style.display = "none";
        }
    });
</script>

@endsection
