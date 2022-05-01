<?php

namespace App\Http\Controllers\backend\management;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('admin.class_management.assign_subject.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['classes'] = StudentClass::all();
        $data['subjects'] = Subjects::all();
        return view('admin.class_management.assign_subject.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'classes' => 'required',
            'subjects.*' => 'required',
            'full_mark.*' => 'required',
            'pass_mark.*' => 'required',
            'subjective_mark.*' => 'required'
        ], 
        [
            'subjects.*.required' => 'This field is required',
            'full_mark.*.required' => 'This field is required',
            'pass_mark.*.required' => 'This field is required',
            'subjective_mark.*.required' => 'This field is required',
        ])->validate();
        $count = count($request->subjects);
        for ($i = 0; $i < $count; $i++) {
            $assign = new AssignSubject();
            $assign->class_id = $request->classes;
            $assign->subject_id = $request->subjects[$i];
            $assign->full_mark = $request->full_mark[$i];
            $assign->pass_mark = $request->pass_mark[$i];
            $assign->subjective_mark = $request->subjective_mark[$i];
            $assign->save();
        }
        return redirect()->route('assign_subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['allData'] = AssignSubject::where('class_id',$id)->orderBy('subject_id')->get();
        return view('admin.class_management.assign_subject.view',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
