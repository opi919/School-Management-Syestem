<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        $data['classes'] = StudentClass::all();
        return view('admin.class_management.class.index', $data);
    }

    public function add()
    {
        return view('admin.class_management.class.add');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:student_classes',
            ],
            [
                'name.unique' => 'fucked!!'
            ]
        );
        $class = new StudentClass();
        $class->name = $request->name;
        $class->save();

        return redirect()->route('class.index');
    }

    public function yindex(){
        $data['years'] = StudentYear::all();
        return view('admin.class_management.year.index',$data);
    }
    public function yadd()
    {
        return view('admin.class_management.year.add');
    }

    public function ystore(Request $request)
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
