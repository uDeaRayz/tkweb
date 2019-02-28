<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Leave;
use App\Resson;
use App\AddLeave;
use PDF;

class ReportDayoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave = '';
        $dayoff = Leave::all();
        $leaves = DB::table('add_leaves')
        ->join('users', 'users.id', '=', 'add_leaves.user_id')
        ->join('amount_leaves', 'amount_leaves.amount_id', '=', 'add_leaves.amount_id')
        ->where('add_leaves.status', '>' , 0)
        ->paginate(15);
        $resson = DB::table('ressons')->join('add_leaves', 'add_leaves.resson_id', 'ressons.resson_id')
            ->get();
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('report.dayoff', compact('leaves','dayoff','data', 'leave','resson'));
    }

    public function getData(Request $request)
    {
        $leave = $request->leave;
        $dayoff = Leave::all();
        if ($leave == '') {
            $leaves = DB::table('add_leaves')
            ->join('users', 'add_leaves.user_id', '=', 'users.id')
            ->join('amount_leaves', 'add_leaves.amount_id', '=', 'amount_leaves.amount_id')
            ->where('add_leaves.status', '>' , 0)
            ->paginate(15);
        } else {
            $leaves = DB::table('add_leaves')
            ->join('users', 'add_leaves.user_id', '=', 'users.id')
            ->join('amount_leaves', 'add_leaves.amount_id', '=', 'amount_leaves.amount_id')
            ->where('add_leaves.status', '>' , 0)
            ->where('amount_leaves.amount_leave', $leave )->paginate(15);
        }

        $resson = DB::table('ressons')->join('add_leaves', 'add_leaves.resson_id', 'ressons.resson_id')
            ->get();

        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('report.dayoff', compact('leaves','dayoff','data','leave','resson'));    
    }


    public function pdf_dayoff(Request $request){
        $leave = $request->name_leave;
        if ($leave == '') {
            $leaves = DB::table('add_leaves')
            ->join('users', 'add_leaves.user_id', '=', 'users.id')
            ->join('amount_leaves', 'add_leaves.amount_id', '=', 'amount_leaves.amount_id')
            ->where('add_leaves.status', '>' , 0)
            ->get();
        } else {
            $leaves = DB::table('add_leaves')
            ->join('users', 'add_leaves.user_id', '=', 'users.id')
            ->join('amount_leaves', 'add_leaves.amount_id', '=', 'amount_leaves.amount_id')
            ->where('add_leaves.status', '>' , 0)
            ->where('amount_leaves.amount_leave', $leave )->get();
        }

        $resson = DB::table('ressons')->join('add_leaves', 'add_leaves.resson_id', 'ressons.resson_id')
            ->get();


        $data = [
            'foo' => 'bar',
        ];
        $pdf = PDF::loadView('report.pdf.leave', $data,compact('leaves','leave','resson'));
        return $pdf->stream('leave.pdf');
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
