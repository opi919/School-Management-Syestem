<?php

namespace App\Http\Controllers\backend\management;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function index()
    {
        $data['years'] = StudentYear::all();
        return view('admin.class_management.year.index', $data);
    }
    public function add()
    {
        return view('admin.class_management.year.add');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'year' => 'required|unique:student_years',
            ],
            [
                'year.unique' => 'fucked!!'
            ]
        );
        $class = new StudentYear();
        $class->year = $request->year;
        $class->save();

        return redirect()->route('year.index');
    }
}
