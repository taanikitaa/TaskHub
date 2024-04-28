<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;

class AbsensiController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        $absensis = Absensi::all();
        return view('home.absensi.index', compact('karyawans','absensis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'keterangan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        Absensi::create($request->all());

        return redirect()->route('home')->with('success', 'Absensi berhasil disimpan.');
    }
}

