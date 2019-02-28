<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddLeave;
use App\User;
use DateTime;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $staff = User::all()->where('level',2)->COUNT('id');
        $trainee = User::all()->where('level',3)->COUNT('id');
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        $date = date('Y-m-d');

        $atten = DB::table('attendances')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->where('attendances.atten_date',$date)
            ->get();
        return view('home',compact('data','staff','trainee','atten'));
    }
}
