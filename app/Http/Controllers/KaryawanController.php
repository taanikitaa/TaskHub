<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan; 
class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $karyawans = Karyawan::all();
        return view('home.karyawan.index', compact('karyawans'));
    }
    public function search(Request $request)
    {
        $search = $request->query('search');
        $karyawans = Karyawan::query();

        if ($search) {
            $karyawans->where('nama', 'like', '%' . $search . '%');

        }

        $karyawans = $karyawans->paginate(10);

        return view('home.karyawan.index', ['karyawans' => $karyawans]);
        }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:karyawans,email',
            'password' => 'required',
        ]);

        Karyawan::create($request->all());
        return redirect()->route('home.karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }


    public function edit(Karyawan $karyawan)
    {
        return view('home.karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'password' => 'required',
        ]);

        $karyawan->update($request->all());
        return redirect()->route('home.karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }


    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('home.karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
