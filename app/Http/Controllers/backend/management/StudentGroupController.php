<?php

namespace App\Http\Controllers\backend\management;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function index()
    {
        $data['groups'] = StudentGroup::all();
        return view('admin.class_management.group.index', $data);
    }
    public function add()
    {
        return view('admin.class_management.group.add');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'group' => 'required|unique:student_groups',
            ],
            [
                'group.unique' => 'fucked!!'
            ]
        );
        $class = new StudentGroup();
        $class->group = $request->group;
        $class->save();

        return redirect()->route('group.index');
    }
}
