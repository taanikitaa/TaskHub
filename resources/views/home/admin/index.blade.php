@extends('layouts.master')
@section('title', 'Data User')
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
        margin: 10% auto;
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
                            <h4>Kelola Data User</h4>
                            <button class="btn btn-primary" style="background-color: #365486;" id="open-modal">Tambah User</button>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('users.search') }}" method="GET" class="flex ml-auto"> 
                            @csrf
                            <div class="flex items-center border rounded-md px-2 py-1" >
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="flex-1 outline-none" style="margin-left: 80%">
                                <button type="submit" class="outline-none">
                                    <i class="fas fa-search text-gray-500 hover:text-gray-700 transition duration-300"></i>
                                </button>
                            </div>                        
                        </form>
                            <table id="example" class="table table-striped table-horve table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->password }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning" style="background-color: #7A8FB2;">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="background-color: #365486;" onclick='return confirm("Apakah anda yakin untuk menghapus?")'>Delete</button>
                                            </form>
                                            @if($user->hasRole('admin'))
                                                <span class="badge badge-primary" style="color: #3A5169;">Admin</span>
                                            @elseif($user->hasRole('pembimbing'))
                                                <span class="badge badge-secondary" style="color: #3A5169;">Pembimbing</span>
                                            @elseif($user->hasRole('karyawan pkl'))
                                                <b><span class="badge badge-success" style="color: #3A5169;">Karyawan PKL</span></b>
                                            @else
                                            <a href="{{ route('users.assignRoleForm', $user->id) }}" class="btn btn-primary" style="background-color: #3A5169;">Assign Role</a>
                                            @endif
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
            <h5 class="modal-title" id="tambahModalLabel">Tambah User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="addAdminForm" method="POST" action="{{ route('users.store') }}" >
                @csrf
                <div class="form-group">
                    <b><label for="name">Nama</label></b>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama">
                </div>
                <div class="form-group">
                    <b><label for="email">Email</label></b>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                </div>
                <div class="form-group">
                    <b><label for="password">Password</label></b>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
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
