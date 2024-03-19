<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" style="background-color: #0F1035;" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
            <img src="img/logo3.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">TaskHub</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white active" href="/home">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @can('manage admin data')
            <li class="nav-item">
                <a class="nav-link text-white" href="/users">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">people_alt</i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Data User</span>
                </a>
            </li>
            @endcan
            @can('manage pembimbing data')
            <li class="nav-item">
                <a class="nav-link text-white" href="/pembimbing">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Data Pembimbing</span>
                </a>
            </li>
            @endcan
            @can('manage karyawan data')
            <li class="nav-item">
                <a class="nav-link text-white" href="/karyawan">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Data Karyawan PKL</span>
                </a>
            </li>
            @endcan
            @can('manage task data')
            <li class="nav-item">
                <a class="nav-link text-white" href="/task">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Data Task</span>
                </a>
            </li>
            @endcan
            @can('manage task')
            <li class="nav-item">
                <a class="nav-link text-white" href="/tasks/karyawan">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Task</span>
                </a>
            </li>
            @endcan
            
            <li class="nav-item">
                <a class="nav-link text-white" href="/report"> 
                    @can('manage report task data')
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assessment</i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Data Report Task</span>
                    @endcan
                    @can('manage report task')
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assessment</i>
                    </div>
                    <span class="nav-link-text ms-1">Report Task</span>
                    @endcan
                </a>
            </li>
            @can('manage jadwal data')
            <li class="nav-item">
                <a class="nav-link text-white" href="/jadwal">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">schedule</i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Data Jadwal</span>
                </a>
            </li>
            @endcan
            @can('manage jadwal')
            <li class="nav-item">
                <a class="nav-link text-white" href="/jadwal/karyawan">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">schedule</i>
                    </div>
                    <span class="nav-link-text ms-1">Jadwal</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
        <button class="btn btn-light text-dark btn-lg" style="width: 100%;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </button>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>
</aside>
