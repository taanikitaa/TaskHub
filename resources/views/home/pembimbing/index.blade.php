@extends('layouts.master')
@section('title', 'Kelola Data Pembimbing')
@section('content')

<div class="content-wrapper" style="padding: 20px;">
    <section class="content">
        <div class="content-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Kelola Data Pembimbing</h4>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('pembimbing.search') }}" method="GET" class="flex ml-auto"> 
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
                                        <th>Nama Pembimbing</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pembimbings as $pembimbing)
                                    <tr>
                                        <td>{{ $pembimbing->id }}</td>
                                        <td>{{ $pembimbing->nama }}</td>
                                        <td>{{ $pembimbing->email }}</td>
                                        <td>{{ $pembimbing->password }}</td>
                                        <td>
                                            <a href="{{ route('pembimbing.edit', $pembimbing->id) }}" class="btn btn-warning" style="background-color: #7A8FB2;">Edit</a>
                                            <form action="{{ route('pembimbing.destroy', $pembimbing->id) }}" method="POST" style="display: inline;">
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

@endsection
