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
        return view('students.index', compact('colleges', 'students'));
    }

    public function create() {
        $colleges = College::orderBy('name', 'asc')->pluck('name', 'id');
        $student = new Student();
        return view('students.create', compact('colleges', 'student'));
    }

    public function store(Request $request) {}
    public function edit($id) {}
    public function update($id, Request $request) {}
    public function destroy($id) {}
}