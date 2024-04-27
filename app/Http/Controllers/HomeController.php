<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Report;
use App\Models\Karyawan;
use App\Models\Absen;
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

        $absen = false; 
        $currentTime = Carbon::now()->format('Y-m-d');
        $absensiHariIni = Absen::where('karyawan_id', auth()->user()->karyawan_id)
                                ->whereDate('created_at', $currentTime)
                                ->first();
        if ($absensiHariIni) {
            $absen = true; 
        }
        return view('dashboard', [
            'totalUsers' => $totalUsers,
            'totalTasks' => $totalTasks,
            'totalReports' => $totalReports,
            'totalKaryawan' => $totalKaryawan,
            'currentTime' => $currentTime,
            'absen' => $absen,
        ]);
    }
}
