@extends('layouts.master')
@section('title', 'Kelola Data Jadwal')
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
        margin:  5% auto;
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

    .btn-tambah {
        margin-bottom: 20px;
        margin-top: 10px; 
    }
    .form-control {
        border: 1px solid #ced4da; 
        border-radius: 5px; 
        margin-top: 5px; 
    }
</style>


<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Kelola Data Jadwal</h4>
                            <button class="btn btn-primary btn-tambah" style="background-color: #365486;" id="open-modal">Tambah Jadwal</button>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Tempat</th>
                                        <th>ID Karyawan</th>
                                        <th>ID Pembimbing</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jadwals as $jadwal)
                                    <tr>
                                        <td>{{ $jadwal->id }}</td>
                                        <td>{{ $jadwal->tanggal }}</td>
                                        <td>{{ $jadwal->waktu }}</td>
                                        <td>{{ $jadwal->tempat }}</td>
                                        <td>{{ $jadwal->id_karyawan }}</td>
                                        <td>{{ $jadwal->id_pembimbing }}</td>
                                        <td>
                                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning" style="background-color: #7A8FB2;">Edit</a>
                                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="background-color: #365486;" onclick='return confirm("Apakah anda yakin untuk menghapus?")'>Delete</button>
                                            </form>
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
            <h5 class="modal-title" id="tambahModalLabel">Tambah Jadwal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="addJadwalForm" action="{{ route('jadwal.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
                </div>
                <div class="form-group">
                    <label for="hari">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu" placeholder="Hari">
                </div>
                <div class="form-group">
                    <label for="tempat">Tempat</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat">
                </div>
                <div class="form-group">
                <label for="id_karyawan">ID Karyawan</label>
                <select class="form-control" id="id_karyawan" name="id_karyawan">
                    <option value="">Pilih Karyawan</option>
                    @foreach($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label for="id_pembimbing">ID Pembimbing</label>
                    <select class="form-control" id="id_pembimbing" name="id_pembimbing">
                        <option value="">Pilih Pembimbing</option>
                        @foreach($pembimbings as $pembimbing)
                            <option value="{{ $pembimbing->id }}">{{ $pembimbing->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #365486">Tambah</button>
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
