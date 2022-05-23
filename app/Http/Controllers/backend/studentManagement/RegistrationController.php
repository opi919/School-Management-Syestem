<?php

namespace App\Http\Controllers\backend\studentManagement;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentManagement\AssignStudent;
use App\Models\StudentManagement\Discount;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = AssignStudent::all();
        return view('admin.student_management.registration.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        return view('admin.student_management.registration.create', $data);
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
            'email' => 'required|unique:users',
            'name' => 'required|min:3',
            'fname' => 'required|min:3',
            'mname' => 'required|min:3',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'dob' => 'required',
            'year' => 'required',
            'class' => 'required',
            'group' => 'required',
            'image' => 'required',
        ])->validate();
        $student = AssignStudent::where('class_id', $request->class)->orderBy('student_id', 'desc')->first();
        // dd($student);
        $roll = null;
        if ($student != null) {
            $user = User::find($student->student_id)->id_no;
            $roll = $user + 1;
        } else {
            $year = StudentYear::where('id',$request->year)->first();
            $roll = $year->year . '00001';
            // dd($roll);
        }
        $code = rand(00000000, 99999999);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->code = $code;
        $user->password = bcrypt($code);
        $user->user_type = 'student';
        $user->father_name = $request->fname;
        $user->mother_name = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->dob = $request->dob;
        $user->id_no = $roll;
        $file = $request->image;
        $filename = date('dmYHi') . $file->getClientOriginalName();
        $file->storeAs('student_images', $filename);
        $user->profile_photo_path = $filename;
        $user->save();

        $assign_student = new AssignStudent();
        $assign_student->student_id = $user->id;
        $assign_student->year_id = $request->year;
        $assign_student->class_id = $request->class;
        $assign_student->group_id = $request->group;
        $assign_student->save();

        if ($request->discount) {
            $discount = new Discount();
            $discount->assign_student_id = $assign_student->id;
            $discount->fee_category_id = FeeCategory::where('fee_category', 'Registration Fee')->first()->id;
            $discount->discount = $request->discount;
            $discount->save();
        }
        return redirect()->route('registration.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
