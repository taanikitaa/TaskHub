@extends('layouts.master')
@section('title', 'Kelola Data Karyawan PKL')
@section('content')

<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Kelola Data Karyawan PKL</h4>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-hover table-bordered">
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
                                    @foreach($karyawans as $karyawan)
                                    <tr>
                                        <td>{{ $karyawan->id }}</td>
                                        <td>{{ $karyawan->nama }}</td>
                                        <td>{{ $karyawan->email }}</td>
                                        <td>{{ $karyawan->password }}</td>
                                        <td>
                                            <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning" style="background-color: #7A8FB2;">Edit</a>
                                            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="background-color: #365486;"onclick='return confirm("Apakah anda yakin untuk menghapus?")'>Delete</button>
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
@endsection
