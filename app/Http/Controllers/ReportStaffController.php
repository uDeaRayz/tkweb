<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use PDF;
use App\AddLeave;
use Illuminate\Support\Facades\View;
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
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('report.staff', compact('user','id','data')); 
                      
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
                    ->where('level',2)->paginate(15);
        }
        if ($request->leave == 2) {
            $id = 2;
            $user = DB::table('users')
                    ->join('positions', 'users.position', '=', 'positions.post_id')
                    ->where('level',3)->paginate(15);
        }
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('report.staff', compact('user','id','data'));
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


    public function trainee_pdf(Request $request) {
            $id = 1;
            $user = DB::table('users')
                    ->join('positions', 'users.position', '=', 'positions.post_id')
                    ->where('level',3)->paginate(15);
        $data = [
            'foo' => 'bar',
        ];
        $pdf = PDF::loadView('report.pdf.staff', $data,compact('user','id'));
        return $pdf->stream('staff.pdf');
    }

    public function staff_pdf(Request $request) {
        $id = 2;
            $user = DB::table('users')
                    ->join('positions', 'users.position', '=', 'positions.post_id')
                    ->where('level',2)->paginate(15);
        $data = [
            'foo' => 'bar',
        ];
        $pdf = PDF::loadView('report.pdf.staff', $data,compact('user','id'));
        return $pdf->stream('staff.pdf');
    }

    public function all_pdf(Request $request) {
        $id = 0;
        $user = DB::table('users')
            ->join('positions', 'users.position', '=', 'positions.post_id')
            ->where('level','>',0 )->paginate(15);
        $data = [
            'foo' => 'bar',
        ];
        $pdf = PDF::loadView('report.pdf.staff', $data,compact('user','id'));
        return $pdf->stream('staff.pdf');
    }
}
