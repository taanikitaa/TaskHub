<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Karyawan;
use App\Models\Pembimbing;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    { 
        $feedbacks = Feedback::with(['report', 'karyawan', 'pembimbing'])->get(); 
        return view('home.feedback', compact('feedbacks')); 
    }

    public function create($id)
    {
        $report = Report::findOrFail($id); 
        $karyawans = Karyawan::all();
        $pembimbings = Pembimbing::all();

        return view('home.report.feedback', compact('report', 'karyawans', 'pembimbings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'feedback' => 'required',
            'id_report' => 'required',
            'id_karyawan' => 'required',
            'id_pembimbing' => 'required',
        ]);

        $feedback = new Feedback();
        $feedback->feedback = $request->feedback;
        $feedback->id_report = $request->id_report;
        $feedback->id_karyawan = $request->id_karyawan;
        $feedback->id_pembimbing = $request->id_pembimbing;
        $feedback->save();
        
        return redirect()->route('home.feedback')->with('success', 'Feedback berhasil disimpan.');
    }
}
