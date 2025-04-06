<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()  {
        $colleges = College::orderBy('name', 'asc')->get();
        return view('colleges.index', compact('colleges'));
    }

    public function show($id) {
        $collegeById = College::find($id);

        if(!$collegeById) {
            return redirect()->route('colleges.index')->with('error', 'We were unable to find a college with the ID you provided. It may be possible that the ID is incorrect or the college no longer exists in our records.');
        }

        return view('colleges.show', compact('collegeById'));
    }

    public function create() {
        $college = new College(); //Instantiate a new empty instance of College to represent a new entry. This will then be populated with the data supplied by the user.
        dd(route('colleges.create'));
        //return view('colleges.create', compact('college'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:colleges,name',
            'address' => 'required'
        ], 
        [
            'name.required' => 'Please enter the name of the college!',
            'name.unique' => 'A college with the same name already exists!',
            'address.required' => 'Please enter a valid address!',
        ]);

        College::create($request->all());
        return redirect()->route('colleges.index')->with('message', 'College has been added successfully');
    }

    public function edit($id) {}
    public function update($id, Request $request) {}
    public function destroy($id) {}
}
