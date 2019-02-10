<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\Resson;
use Illuminate\Support\Facades\Validator;
use DB;

class DayoffTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dayoff = Leave::all()->paginate(15);
        return view('dayoff.dayoff', compact('dayoff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dayoff.dayoff-type');

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
        Leave::create($request->all());
        return redirect('dayoff-type')->with('add','เพิ่มตำแหน่งสำเร็จ');
    } 

    public function validation($request)
    {
        return $this->validate($request,[
            'leave_name' => 'required|unique:leaves',
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
        DB::table('leaves')->where('leaves.leave_id', $id)->delete();
        DB::table('ressons')->where('ressons.leave_id', $id)->delete();

        // $leave = Leave::find($id);
        // $resson = Resson::all()->where('user_id',$id);
        // $resson->delete();
        // $leave->delete();
        return redirect('dayoff-type')->with('del', 'ลบข้อมูลเรียบร้อย');
    }
}
