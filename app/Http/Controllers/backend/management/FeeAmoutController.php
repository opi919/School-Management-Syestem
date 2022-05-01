<?php

namespace App\Http\Controllers\backend\management;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeeAmoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['amounts'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('admin.class_management.fee_amount.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('admin.class_management.fee_amount.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'fee_categories' => 'required',
                'classes.*' => 'required',
                'fee_amount.*' => 'required'
            ],
            [
                'classes.*.required' => ' classes field required',
                'fee_amount.*.required' => ' fee amount field required',
            ]
        )->validate();
        $count = count($request->classes);
        for ($i = 0; $i < $count; $i++) {
            $item = new FeeAmount();
            $item->fee_category_id = $request->fee_categories;
            $item->class_id = $request->classes[$i];
            $item->amount = $request->fee_amount[$i];
            $item->save();
        }

        return redirect()->route('fee_amount.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $data['allData'] = FeeAmount::where('fee_category_id', $id)->orderBy('class_id')->get();
        // dd($data['allData']->toArray());
        return view('admin.class_management.fee_amount.view', $data);
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
