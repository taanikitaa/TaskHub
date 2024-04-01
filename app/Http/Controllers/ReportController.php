<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Karyawan;
use App\Models\Pembimbing;
use App\Models\Task;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $reports = Report::all();
        $karyawans = Karyawan::all();
        $pembimbings = Pembimbing::all();
        $tasks = Task::all();

        return view('home.report.index', compact(['reports', 'karyawans', 'pembimbings', 'tasks']));

    }


    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('home.report.detail', compact('report'));
    }

    public function edit($id)
    {
        $report = Report::find($id); 
        $karyawans = Karyawan::all(); 
        $pembimbings = Pembimbing::all(); 
        $tasks = Task::all(); 
    
        return view('home.report.edit', compact('report', 'karyawans', 'pembimbings','tasks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_report' => 'required',
            'tanggal_report' => 'required|date',
            'id_karyawan' => 'required|exists:karyawans,id',
            'id_pembimbing' => 'required|exists:pembimbings,id',
            'id_task' => 'required|exists:tasks,id',
            'dokumen' => 'nullable', 
            'link_video' => 'nullable',
            'status' => 'required',
        ]);

        $report = Report::findOrFail($id);
        $report->update($request->all());

        return redirect()->route('home.report.index')->with('success', 'Report berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('home.report.index')->with('success', 'Report berhasil dihapus.');
    }
}
