<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Leave;
use App\AddLeave;

class ReportDayoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 0;
        $dayoff = Leave::all();
        $atten = DB::table('add_leaves')
        ->join('users', 'users.id', '=', 'add_leaves.user_id')
        ->join('amount_leaves', 'amount_leaves.amount_id', '=', 'add_leaves.amount_id')
        ->where('add_leaves.status','>',0 )->paginate(15);
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('report.dayoff', compact('atten','dayoff','id','data'));
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
        $dayoff = Leave::all();
        if ($request->leave == 0) {
            $id = 0;
            $atten = DB::table('add_leaves')
            ->join('users', 'add_leaves.user_id', '=', 'users.id')
            ->join('leaves', 'add_leaves.leave_id', '=', 'leaves.leave_id')
            ->where('leaves.leave_id','>',0 )->paginate(15);
        }
        else{
            $id = $request->leave;
            $atten = DB::table('add_leaves')
            ->join('users', 'add_leaves.user_id', '=', 'users.id')
            ->join('leaves', 'add_leaves.leave_id', '=', 'leaves.leave_id')
            ->where('leaves.leave_id', $request->leave )->paginate(15);
        }
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('report.dayoff', compact('atten','dayoff','id','data'));
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
