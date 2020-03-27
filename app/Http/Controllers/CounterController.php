<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Counter;
use App\Teacher;

// date_default_timezone_set("Asia/Manila");

class CounterController extends Controller
{
    public function index() {
        $teachers = Teacher::all()->toArray();
        return view('counter.index', compact('teachers'));
    }

    public function submit(Request $req) {
        $counter = new Counter();
        $counter->grade_level = $req->radioGrade;
        $counter->section = $req->selectSection;
        $counter->save();
        return redirect('counter')->with('status', 'Success! you may now enter the library');
    }
}
