<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class AdminController extends Controller
{




    public function index()
    {
        $admin = DB::table('users')->where('status', '=', 1)->get();  //แสดงข้อมูลจาก status
        return view('user.admin.admin', compact('admin'));
    }



    public function create()
    {
        return view('user.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);
        // User::create($request->all());
        User::create([
            'prename' => $request['prename'],
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'status' => $request['status'],
            'level' => $request['level'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        return redirect('admin')->with('Status','เพิ่มผู้ดูแลสำเร็จ');
    } 

    public function validation($request)
    {
        return $this->validate($request,[
            'prename' => 'required',
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
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
        $admin = user::find($id);
        $admin->delete();
        return redirect('admin')->with('del', 'ลบข้อมูลเรียบร้อย');
    }
}
