<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\Resson;
use DB;
use Illuminate\Support\Facades\Validator;

class RessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dayoff = Leave::all();

        $resson = DB::table('ressons')
                    ->leftJoin('leaves', 'ressons.leave_id', '=', 'leaves.leave_id')
                    ->get();
        return view('dayoff.resson',compact('dayoff', 'resson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);
        Resson::create($request->all());
        return redirect('resson')->with('add','เพิ่มตำแหน่งสำเร็จ');
    } 

    public function validation($request)
    {
        return $this->validate($request,[
            'resson_name' => 'required',
            'leave_id' => 'required',
        ]);
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
        $resson = Resson::find($id);
        $resson->delete();
        return redirect('resson')->with('del', 'ลบข้อมูลเรียบร้อย');
    }
}
