<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
class ReportStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 0;
        $user = DB::table('users')
        ->join('positions', 'users.position', '=', 'positions.post_id')
        ->where('level','>',0 )->paginate(15);
        return view('report.staff', compact('user','id')); 
                      
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
        if ($request->leave == 0) {
            $id = 0;
            $user = DB::table('users')
                    ->join('positions', 'users.position', '=', 'positions.post_id')
                    ->where('level','>',0 )->paginate(15);
        }
        if ($request->leave == 1) {
            $id = 1;
            $user = DB::table('users')
                    ->join('positions', 'users.position', '=', 'positions.post_id')
                    ->where('level',1)->paginate(15);
        }
        if ($request->leave == 2) {
            $id = 2;
            $user = DB::table('users')
                    ->join('positions', 'users.position', '=', 'positions.post_id')
                    ->where('level',2)->paginate(15);
        }
        return view('report.staff', compact('user','id'));
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
