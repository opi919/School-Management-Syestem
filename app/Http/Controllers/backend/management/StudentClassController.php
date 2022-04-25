<?php

namespace App\Http\Controllers\backend\management;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
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
}
