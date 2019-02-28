<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddLeave;
use App\Work;
use DB;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ldate = date('Y-m-d');
        $work = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
                ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
                ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
                ->orderBy('works.date', 'desc')
                ->get();
                       
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('work.work',compact('data','work'));
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
        $work = DB::table('works')
        ->join('users', 'users.id', '=', 'works.user_id')
        ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
        ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
        ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
        ->where('works.work_id',$id)
        ->first();      
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('work.show',compact('data','work'));
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
