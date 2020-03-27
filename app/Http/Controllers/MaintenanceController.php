<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
class MaintenanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $teacher = Teacher::latest()->paginate(10);
        return view('maintenance.index', compact('teacher'));
    }

    public function insert(Request $req) {
        $teacher = new Teacher();
        $teacher->first_name = $req->first_name;
        $teacher->last_name = $req->last_name;
        $teacher->grade_level = $req->grade_level;
        $teacher->section = $req->section;
        $teacher->save();
        return redirect('maintenance')->with('status', 'Successfully added teacher');

    }

    public function delete(Request $req) {
        $teacher = Teacher::where('id', $req->deleteID);
        $teacher->delete();
        return redirect('maintenance')->with('status', 'Successfully deleted teacher');

    }

    public function update(Request $req) {
        $teacher = Teacher::where('id', $req->updateID);
        $teacher->update(
            [
                'first_name' => $req->first_name,
                'last_name' => $req->last_name,
                'grade_level' => $req->grade_level,
                'section' => $req->section
            ]
            );
        return redirect('maintenance')->with('status', 'Successfully updated teacher');
    }
    
}
