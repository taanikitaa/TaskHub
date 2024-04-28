<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Report;
use App\Models\Karyawan;
use App\Models\Absensi;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
     public function index()
{
    $totalUsers = User::count();
    $totalTasks = Task::count();
    $totalReports = Report::count();
    $totalKaryawan = Karyawan::count();

    $statusAbsen = Absensi::where('karyawan_id', auth()->user()->id)
                           ->whereDate('tanggal', Carbon::today())
                           ->exists();

    $currentTime = Carbon::now()->format('Y-m-d');
    return view('dashboard', [
        'totalUsers' => $totalUsers,
        'totalTasks' => $totalTasks,
        'totalReports' => $totalReports,
        'totalKaryawan' => $totalKaryawan,
        'statusAbsen' => $statusAbsen, 
        'currentTime' => $currentTime,
    ]);
}

}
