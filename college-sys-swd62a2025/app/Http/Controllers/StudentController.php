<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $colleges = College::orderBy('name', 'asc')->pluck('name', 'id');
        $students = Student::all();
        return view('students.index', compact('students', 'colleges'));
    }

    public function create() {}
    public function store(Request $request) {}
    public function edit($id) {}
    public function update($id, Request $request) {}
    public function destroy($id) {}
}