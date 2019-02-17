<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AddLeave;
use App\Resson;

class DayoffController extends Controller
{

    public function index()
    {
        $leave = DB::table('add_leaves')
        ->join('amount_leaves', 'amount_leaves.amount_id', '=', 'add_leaves.amount_id')
        ->join('users', 'users.id', '=', 'add_leaves.user_id')
        ->where('add_leaves.status',0)->get();
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('dayoff.dayoffData',compact('leave','data'));
    }

    public function allow()
    {
        $leave = DB::table('add_leaves')
        ->join('amount_leaves', 'amount_leaves.amount_id', '=', 'add_leaves.amount_id')
        ->join('users', 'users.id', '=', 'add_leaves.user_id')
        ->where('add_leaves.status',1)->get();
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('dayoff.allow',compact('leave','data'));
    }

    public function notallow()
    {
        $leave = DB::table('add_leaves')
        ->join('amount_leaves', 'amount_leaves.amount_id', '=', 'add_leaves.amount_id')
        ->join('users', 'users.id', '=', 'add_leaves.user_id')
        ->where('add_leaves.status',2)->get();
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('dayoff.notallow',compact('leave','data'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {  
        
        $dayoff = DB::table('add_leaves') 
        ->join('amount_leaves', 'amount_leaves.amount_id', '=', 'add_leaves.amount_id')
        ->join('users', 'users.id', '=', 'add_leaves.user_id')
        ->where('add_leaves.add_id',$id)
        ->first();
        $diff = AddLeave::select(DB::raw('DATEDIFF(date_end,date_start) as days'))->where('add_leaves.add_id',$id)->first(); //จำนวนวัน
        $resson = DB::table('ressons')
                ->join('leaves', 'leaves.leave_id', '=', 'ressons.leave_id')
                ->where('leaves.leave_name',$dayoff->leave_name)
                ->get();
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('dayoff.show',compact('dayoff', 'resson', 'data'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        DB::table('add_leaves')
            ->where('add_leaves.add_id', $id)
            ->update([
                'status' => $request['status'],
                'resson_id' => $request['resson_id'],
                'comment' => $request['comment'],
        ]);
        return redirect('dayoff')->with('update','ทำรายการสำเร็จ');
    }


    public function destroy($id)
    {
        //
    }
}
