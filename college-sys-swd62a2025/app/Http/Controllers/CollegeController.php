<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()  {
        $colleges = College::orderBy('name', 'asc');
        return view('colleges.index', compact('colleges'));
    }

    public function show($id) {
        $collegeById = College::find($id);

        if(!$collegeById) {
            return redirect()->route('colleges.index')->with('error', 'We were unable to find a college with the ID you provided. It may be possible that the ID is incorrect or the college no longer exists in our records.');
        }

        return view('colleges.show', compact($collegeById));
    }

    public function create() {}
    public function store(Request $request) {}
    public function edit($id) {}
    public function update($id, Request $request) {}
    public function destroy($id) {}
}
