<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Karyawan;
use App\Models\Pembimbing;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $jadwals = Jadwal::all();
        $karyawans = Karyawan::join('users', 'users.email', '=', 'karyawans.email')->select('users.id', 'karyawans.nama')->get();
        $pembimbings = Pembimbing::join('users', 'users.email', '=', 'pembimbings.email')->select('users.id', 'pembimbings.nama')->get();
        return view('home.jadwal.index', compact(['jadwals','karyawans','pembimbings']));
    }
    public function search(Request $request)
    {
        $search = $request->query('search');
        $jadwals = Jadwal::query();

        if ($search) {
            $jadwals->where('tanggal', 'like', '%' . $search . '%')
                    ->orWhere('tempat', 'like', '%' . $search . '%');

        }

        $jadwals = $jadwals->paginate(10);

        $karyawans = Karyawan::all();
        $pembimbings = Pembimbing::all();

        return view('home.jadwal.index', compact('jadwals', 'karyawans', 'pembimbings'));    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i', 
            'tempat' => 'required|string|max:50',
            'id_karyawan' => 'required|integer',
            'id_pembimbing' => 'required|integer',
        ]);
        $tanggal = Carbon::createFromFormat('Y-m-d', $request->tanggal);
        $request->merge(['tanggal' => $tanggal]);

        $data = $request->all();
        $data['waktu'] = Carbon::now()->format('H:i:s'); 

        Jadwal::create($data);

        return redirect()->route('home.jadwal.index')->with('success', 'Jadwal created successfully.');
    }


    public function edit($id)
    {
        $jadwal = Jadwal::find($id); 
        $karyawans = Karyawan::all(); 
        $pembimbings = Pembimbing::all(); 
    
        return view('home.jadwal.edit', compact('jadwal', 'karyawans', 'pembimbings'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'tempat' => 'required|string|max:50',
            'id_karyawan' => 'required|integer',
            'id_pembimbing' => 'required|integer',
        ]);
        $tanggal = Carbon::createFromFormat('Y-m-d', $request->tanggal);
        $request->merge(['tanggal' => $tanggal]);

        $waktu = Carbon::createFromFormat('h:i A', $request->waktu)->format('H:i:s');
        $request->merge(['waktu' => $waktu]);

        $jadwal->update($request->all());

        return redirect()->route('home.jadwal.index')->with('success', 'Jadwal updated successfully');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('home.jadwal.index')
            ->with('success', 'Jadwal deleted successfully');
    }
    
    public function karyawanJadwal()
    {
        $idKaryawan = auth()->user()->id ;
        $karyawanJadwal = Jadwal::join('users', 'jadwals.id_pembimbing', '=', 'users.id')
        ->where('jadwals.id_karyawan', $idKaryawan)
        ->select('jadwals.*', 'users.name as nama_pembimbing')
        ->get();
        $jadwals = Jadwal::where('id_karyawan', $idKaryawan)->first();
        $karyawans = Karyawan::all();
        $pembimbings = Pembimbing::all();
        
        return view('home.karyawan.jadwal', compact('jadwals', 'karyawanJadwal', 'karyawans', 'pembimbings'));
    }



}

