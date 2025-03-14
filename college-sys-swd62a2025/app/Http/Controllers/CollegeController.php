<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()  {
        $colleges = College::orderBy('name', 'asc');
        return view("colleges.index", compact("colleges"));
    }

    public function create() {}
    public function store(Request $request) {}
    public function edit($id) {}
    public function update($id, Request $request) {}
    public function destroy($id) {}
}
