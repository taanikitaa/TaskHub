<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Karyawan;

class AbsenController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        $absen = Absen::all();
        return view('home.karyawan.absen', compact('karyawan','absen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'keterangan' => 'required|in:izin,sakit,masuk',
        ]);

        $absen = $request->all();

        return redirect()->back()->with('success', 'Absen berhasil.');
    }
}
