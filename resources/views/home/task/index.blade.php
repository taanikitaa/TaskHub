@extends('layouts.master')
@section('title', 'Kelola Data Task')
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
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 800px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
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
                        @can('manage task data')
                            <h4>Kelola Data Task</h4>
                            <a href="#" id="open-modal" class="btn btn-primary" style="background-color: #365486;">Tambah Task</a>
                            @endcan
                        </div>
                        <div class="card-body">
                        <form action="{{ route('task.search') }}" method="GET" class="flex ml-auto"> 
                            @csrf
                            <div class="flex items-center border rounded-md px-2 py-1" >
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="flex-1 outline-none" style="margin-left: 80%">
                                <button type="submit" class="outline-none">
                                    <i class="fas fa-search text-gray-500 hover:text-gray-700 transition duration-300"></i>
                                </button>
                            </div>                        
                        </form>
                            <table id="example" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Task</th>
                                        <th>Deadline</th>
                                        <th>Level</th>
                                        <th>Karyawan</th>
                                        <th>Pembimbing</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->nama_task }}</td>
                                        <td>{{ $task->deadline }}</td>
                                        <td>{{ $task->level }}</td>
                                        <td>{{ $task->karyawan->nama }}</td>
                                        <td>{{ $task->pembimbing->nama }}</td>
                                        <td>
                                        @can('manage task data')
                                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning" style="background-color: #7A8FB2;">Edit</a>
                                            <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="background-color: #365486;" onclick='return confirm("Apakah anda yakin untuk menghapus?")'>Delete</button>
                                            </form>
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
<div class="tambah-modal" id="tambah-modal">
    <div class="tambah-modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahModalLabel">Tambah Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="addTaskForm" method="POST" action="{{ route('task.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nama_task">Nama Task</label>
                    <input type="text" class="form-control" id="nama_task" name="nama_task" placeholder="Masukkan nama task">
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline">
                </div>
                <div class="form-group">
                    <label for="status">Level</label>
                    <select class="form-control" id="level" name="level">
                        <option value="Urgent">Urgent</option>
                        <option value="Not Urgent">Not Urgent</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="id_karyawan">Karyawan</label>
                <select class="form-control" id="id_karyawan" name="id_karyawan">
                    <option value="">Pilih Karyawan</option>
                    @foreach($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_pembimbing"> Pembimbing</label>
                <select class="form-control" id="id_pembimbing" name="id_pembimbing">
                    <option value="">Pilih Pembimbing</option>
                    @foreach($pembimbings as $pembimbing)
                        <option value="{{ $pembimbing->id }}">{{ $pembimbing->nama }}</option>
                    @endforeach
                </select>
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
