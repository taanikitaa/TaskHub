<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Karyawan;
use App\Models\Pembimbing;
use App\Models\Report;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tasks = Task::all();
        $karyawans = Karyawan::all();
        $pembimbings = Pembimbing::all();
        return view('home.task.index', compact(['tasks','karyawans', 'pembimbings']));
    }

    public function search(Request $request)
    {
        $search = $request->query('search');
        $tasks = Task::query();

        if ($search) {
            $tasks->where('nama_task', 'like', '%' . $search . '%');
        }

        $tasks = $tasks->paginate(10);
        $karyawans = Karyawan::all();
        $pembimbings = Pembimbing::all();

        return view('home.task.index', compact('tasks', 'karyawans', 'pembimbings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_task' => 'required',
            'deadline' => 'required|date',
            'level' => 'required',
            'id_karyawan' => 'required|exists:karyawans,id',
            'id_pembimbing' => 'required|exists:pembimbings,id',
        ]);

        Task::create($request->all());
        return redirect()->route('home.task.index')->with('success', 'Task berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $task = Task::find($id); 
        $karyawans = Karyawan::all(); 
        $pembimbings = Pembimbing::all(); 
    
        return view('home.task.edit', compact('task', 'karyawans', 'pembimbings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_task' => 'required',
            'deadline' => 'required|date',
            'level' => 'required',
            'id_karyawan' => 'required|exists:karyawans,id',
            'id_pembimbing' => 'required|exists:pembimbings,id',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('home.task.index')->with('success', 'Task berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('home.task.index')->with('success', 'Task berhasil dihapus.');
    }
    public function karyawanTasks()
    {
        $idKaryawan = auth()->user()->id;
        $karyawanTasks = Task::where('id_karyawan', $idKaryawan)->with('report')->get();        
        $karyawans = Karyawan::all(); 
        $pembimbings = Pembimbing::all(); 
        $tasks = Task::all();
        $report = Report::all();
        
        return view('home.karyawan.task', compact('karyawanTasks', 'karyawans','pembimbings','tasks','report'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'nama_report' => 'required',
            'tanggal_report' => 'required|date',
            'id_karyawan' => 'required|exists:karyawans,id',
            'id_pembimbing' => 'required|exists:pembimbings,id',
            'id_task' => 'required|exists:tasks,id',
            'dokumen' => 'required|file', 
            'link_video' => 'nullable',
        ]);

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('report'), $fileName); 
        }
        Report::create([
            'nama_report' => $request->nama_report,
            'tanggal_report' => $request->tanggal_report,
            'id_karyawan' => $request->id_karyawan,
            'id_pembimbing' => $request->id_pembimbing,
            'id_task' => $request->id_task,
            'dokumen' => isset($fileName) ? $fileName : null, 
            'link_video' => $request->link_video,
        ]);

        return redirect()->route('home.report.index')->with('success', 'Report berhasil ditambahkan.');
    }


    
}
