<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $colleges = College::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All colleges', '0');
        
        if(!request('college_id')) {
            $students = Student::all();
        } else {
            $students = Student::where('college_id', request('college_id'))->get();
        }

        if(!request('name_order')) {
            $students = Student::all();
        } else {
            if(request('name_order') == 'asc')
                $students = Student::orderBy('name', 'asc')->get();
            else if(request('name_order') == 'desc')
                $students = Student::orderBy('name', 'desc')->get();
        }

        return view('students.index', compact('students', 'colleges'));
    }

    public function show($id) {
        $studentById = Student::find($id);

        if(!$studentById) {
            return redirect()->route('students.index')->with('error', 'We were unable to find a student with the ID you provided. It may be possible that the ID is incorrect or the college no longer exists in our records.');
        }

        return view('students.show', compact('studentById'));
    }

    public function create() {
        $colleges = College::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All colleges', '0');
        $student = new Student();
        return view('students.create', compact('colleges', 'student'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,name',
            'phone' => 'required|digits:8',
            'dob' => 'required',
            'college_id' => 'required|exists:colleges,id'
        ], 
        [
            'name.required' => 'Please enter the name of the college!',
            'email.required' => 'Please enter a valid email address!',
            'email.email' => 'Please enter the email address in the correct format!',
            'email.unique' => 'This email is already associated with another student!',
            'phone.required' => 'Please enter a phone number!',
            'phone.digits' => 'Please make sure that the phone number comprosises of 8 digits!',
            'dob.required' => 'Please make sure to enter the date of birth!',
            'college_id.required' => 'Please select a college!',
            'college_id.exists' => 'The selected college does not exist!'
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    public function edit($id) {
        $studentById = Student::find(request('id'));

        if(!$studentById) {
            return redirect()->route('students.index')->with('error', 'We were unable to find a student with the ID you provided. It may be possible that the ID is incorrect or the student no longer exists in our records.');
        }

        $colleges = College::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All colleges', '0');

        return view('students.edit', compact('colleges', 'studentById'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,name,' . $id,
            'phone' => 'required|digits:8',
            'dob' => 'required',
            'college_id' => 'required|exists:colleges,id'
        ], 
        [
            'name.required' => 'Please enter the name of the college!',
            'email.required' => 'Please enter a valid email address!',
            'email.email' => 'Please enter the email address in the correct format!',
            'email.unique' => 'This email is already associated with another student!',
            'phone.required' => 'Please enter a phone number!',
            'phone.digits' => 'Please make sure that the phone number comprosises of 8 digits!',
            'dob.required' => 'Please make sure to enter the date of birth!',
            'college_id.required' => 'Please select a college!',
            'college_id.exists' => 'The selected college does not exist!'
        ]);

        $student = Student::find($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id) {
        $student = Student::find($id);
        $student->delete();
        return back()->with('success', 'Student deleted successfully!');
    }
}