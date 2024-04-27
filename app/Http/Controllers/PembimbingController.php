<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembimbing;
use App\Models\User;

class PembimbingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $pembimbings = Pembimbing::all();
        return view('home.pembimbing.index', compact('pembimbings'));
    }

    public function search(Request $request)
    {
        $search = $request->query('search');
        $pembimbings = Pembimbing::query();

        if ($search) {
            $pembimbings->where('nama', 'like', '%' . $search . '%');

        }

        $pembimbings = $pembimbings->paginate(10);

        return view('home.pembimbing.index', ['pembimbings' => $pembimbings]);
        }


    public function store(Request $request)
    {
        $request->validate([
            'nama_pembimbing' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email|unique:pembimbings,email',
            'password' => 'required',
        ]);

        Pembimbing::create($request->all());
        return redirect()->route('home.pembimbing.index')->with('success', 'Pembimbing berhasil ditambahkan.');
    }

    public function edit(Pembimbing $pembimbing)
    {
        return view('home.pembimbing.edit', compact('pembimbing'));
    }

    public function update(Request $request, Pembimbing $pembimbing)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pembimbings,email,' . $pembimbing->id,
            'password' => 'required',
        ]);

        $pembimbing->update($request->all());
        return redirect()->route('home.pembimbing.index')->with('success', 'Data pembimbing berhasil diperbarui.');
    }

    public function destroy(Pembimbing $pembimbing)
    {
        $pembimbing->delete();
        return redirect()->route('home.pembimbing.index')->with('success', 'Data pembimbing berhasil dihapus.');
    }
}
