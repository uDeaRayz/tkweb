<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddLeave;
use DB;
use PDF;
use Illuminate\Support\Facades\View;

class ReportWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start = "";
        $end = "";
        $work = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
                ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
                ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
                ->orderBy('works.date', 'asc')
                ->paginate(15);

        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('report.work',compact('data','work','start','end'));
    }

    public function getData(Request $request){
        $start = $request->start;
        $end = $request->end;
        if ($request->start == "" && $request->end == "") {
            $work = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
                ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
                ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
                ->orderBy('works.date', 'asc')
                ->paginate(15);
        }
        elseif($request->start == "" && !$request->end == ""){
            $work = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
                ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
                ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
                ->where('works.date' , '<=' , $request->end)
                ->orderBy('works.date', 'asc')
                ->paginate(15);
        }
        elseif($request->end == "" && !$request->start == ""){
            $work = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
                ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
                ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
                ->where('works.date' , '>=' , $request->end)
                ->orderBy('works.date', 'asc')
                ->paginate(15);
        }
        else {
            $work = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
                ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
                ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
                ->whereBetween('works.date',[$request->start,$request->end])
                ->orderBy('works.date', 'asc')
                ->paginate(15);
        }

        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('report.work',compact('data','work','start','end'));
    }
    public function pdf_work(Request $request){
        $start = $request->start;
        $end = $request->end;
        if ($request->start == "" && $request->end == "") {
            $work = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
                ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
                ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
                ->orderBy('works.date', 'asc')
                ->paginate(15);
        }
        elseif($request->start == "" && !$request->end == ""){
            $work = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
                ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
                ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
                ->where('works.date' , '<=' , $request->end)
                ->orderBy('works.date', 'asc')
                ->paginate(15);
        }
        elseif($request->end == "" && !$request->start == ""){
            $work = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
                ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
                ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
                ->where('works.date' , '>=' , $request->end)
                ->orderBy('works.date', 'asc')
                ->paginate(15);
        }
        else {
            $work = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
                ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
                ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
                ->whereBetween('works.date',[$request->start,$request->end])
                ->orderBy('works.date', 'asc')
                ->paginate(15);
        }
        $data = [
            'foo' => 'bar',
        ];
        $pdf = PDF::loadView('report.pdf.works', $data,compact('work','start','end'));
        return $pdf->stream('work.pdf');
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
