<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddLeave;
use App\Attendance;
use\DB;

class AttenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atten = DB::table('attendances')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->get();
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('attendance.atten',compact('data','atten'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atten = DB::table('attendances')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->where('attendances.atten_id', $id)
                ->first();

        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('attendance.show',compact('data','atten'));
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
