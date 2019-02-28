<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddLeave;
use DB;
use PDF;
use Illuminate\Support\Facades\View;

class ReportAttenController extends Controller
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
        $atten = DB::table('attendances')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->paginate(15);

        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('report.atten',compact('data','atten','start','end'));
    }

    public function getData(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        if ($request->start == "" && $request->end == "") {
            $atten = DB::table('attendances')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->orderBy('attendances.atten_date', 'asc')
            ->paginate(15); 
        }
        elseif($request->start == "" && !$request->end == ""){
            $atten = DB::table('attendances')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->where('attendances.atten_date' , '<=' , $request->end)
                ->orderBy('attendances.atten_date', 'asc')
                ->paginate(15);
        }
        elseif($request->end == "" && !$request->start == ""){
            $atten = DB::table('attendances')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->where('attendances.atten_date','>=',$request->start)
                ->orderBy('attendances.atten_date', 'asc')
                ->paginate(15);
        }
        else {
            $atten = DB::table('attendances')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->whereBetween('attendances.atten_date',[$request->start,$request->end])
                ->orderBy('attendances.atten_date', 'asc')
                ->paginate(15);
        }
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('report.atten',compact('data','atten','start','end'));
    }

    public function pdf_atten(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        if ($request->start == "" && $request->end == "") {
            $atten = DB::table('attendances')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->orderBy('attendances.atten_date', 'asc')
            ->get(); 
        }
        elseif($request->start == "" && !$request->end == ""){
            $atten = DB::table('attendances')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->where('attendances.atten_date' , '<=' , $request->end)
                ->orderBy('attendances.atten_date', 'asc')
                ->get();
        }
        elseif($request->end == "" && !$request->start == ""){
            $atten = DB::table('attendances')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->where('attendances.atten_date','>=',$request->start)
                ->orderBy('attendances.atten_date', 'asc')
                ->get();
        }
        else {
            $atten = DB::table('attendances')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->whereBetween('attendances.atten_date',[$request->start,$request->end])
                ->orderBy('attendances.atten_date', 'asc')
                ->get();
        }
        
        $data = [
            'foo' => 'bar',
        ];
        $pdf = PDF::loadView('report.pdf.attendance', $data,compact('atten','start','end'));
        return $pdf->stream('attendance.pdf');
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
