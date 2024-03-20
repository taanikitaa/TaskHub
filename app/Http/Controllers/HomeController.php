<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Report;
use App\Models\Karyawan;
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

        $currentTime = Carbon::now()->format('Y-m-d H:i:s');

        return view('dashboard', [
            'totalUsers' => $totalUsers,
            'totalTasks' => $totalTasks,
            'totalReports' => $totalReports,
            'totalKaryawan' => $totalKaryawan,
            'currentTime' => $currentTime,
        ]);
    }
}
