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

    public function show($id) {
        $studentById = Student::find($id);

        if(!$studentById) {
            return redirect()->route('students.index')->with('error', 'We were unable to find a student with the ID you provided. It may be possible that the ID is incorrect or the college no longer exists in our records.');
        }

        return view('students.show', compact('studentById'));
    }

    public function create() {
        $colleges = College::orderBy('name', 'asc')->pluck('name', 'id');
        $student = new Student();
        return view('students.create', compact('colleges', 'student'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,name',
            'phone' => 'required|max:8',
            'dob' => 'required',
            'college_id' => 'required|exists:colleges,id'
        ]);

        Student::create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully');
    }

    public function edit($id) {}
    public function update($id, Request $request) {}
    public function destroy($id) {}
}