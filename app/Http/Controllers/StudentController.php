<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;


class StudentController extends Controller
{
    public function index() {
        return view('student');
    }
    public function submit(Request $req) {
        $student = new Student();
        $student->student_id = $req->studentID;
        $student->first_name = $req->firstName;
        $student->middle_name = $req->middleName;
        $student->last_name = $req->lastName;
        $student->college = $req->college;
        $student->course = $req->course;
        $student->year_level = $req->yearLevel;
        $student->save();
        return redirect('student');
    }
}
