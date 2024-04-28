@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-book opacity-10 text-black"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Task</p>
                        <h4 class="mb-0">{{$totalTasks}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-book opacity-10 text-black"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Report</p>
                        <h4 class="mb-0">{{$totalReports}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        @can('manage admin data')
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-user opacity-10 text-black"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total User</p>
                        <h4 class="mb-0">{{$totalUsers}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        @endcan
        @can('manage karyawan data')
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-user opacity-10 text-black"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Karyawan</p>
                        <h4 class="mb-0">{{$totalKaryawan}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        @endcan
    </div>

    <div class="row mt-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-dark">
                <h5 class="text-white mb-0">Dashboard</h5>
            </div>
            <div class="card-body">
                <p class="lead">Hi, Selamat datang di aplikasi TaskHub</p>
                <div class="shortcut-buttons">
                    @can('manage admin data')
                    <a href="/users" class="btn btn-outline-dark"><i class="fas fa-user"></i> User</a>
                    <a href="/pembimbing" class="btn btn-outline-dark"><i class="fas fa-chalkboard-teacher"></i> Pembimbing</a>
                    @endcan
                    @can('manage karyawan data')
                    <a href="/karyawan" class="btn btn-outline-dark"><i class="fas fa-user-tie"></i> Karyawan</a>
                    <a href="/task" class="btn btn-outline-dark"><i class="fas fa-tasks"></i> Task</a>
                    <a href="/report" class="btn btn-outline-dark"><i class="fas fa-chart-bar"></i> Report</a>
                    <a href="/jadwal" class="btn btn-outline-dark"><i class="far fa-calendar-alt"></i> Jadwal</a>
                    @endcan
                    @can('manage report task')
                    <a href="/tasks/karyawan" class="btn btn-outline-dark"><i class="fas fa-tasks"></i> Task</a>
                    <a href="{{route('task.report')}}" class="btn btn-outline-dark"><i class="fas fa-chart-bar"></i> Report</a>
                    <a href="/jadwal/karyawan" class="btn btn-outline-dark"><i class="far fa-calendar-alt"></i> Jadwal</a>
                    @if(!$statusAbsen)
                        <a href="{{ route('absensi.index') }}" class="btn btn-primary" style="background-color: #3A5169; color: white;">Absen Hari Ini</a>
                    @else
                        <p>Anda sudah absen hari ini.</p>
                    @endif
                    @endcan
                </div>
                
            </div>
            
        </div>
    </div>
@endsection
