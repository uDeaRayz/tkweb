<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\leave;
use App\Position;
use App\AmountLeave;
use App\AddLeave;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainee = DB::table('users')
        ->join('positions', 'users.position', '=', 'positions.post_id')
        ->where('level', '=', 3)->paginate(15);
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('user.trainee.trainee', compact('trainee','data'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dayoff = Leave::all();
        $position = Position::all();
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('user.trainee.create' ,compact('dayoff','position','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'prename' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'img' => 'nullable',
        ]);

        
        if (!$request->img == null) {
            $path = $request->file('img')->store('public/img');
            $sub = str_replace("public","storage" , $path);
                
            $trainee =  User::create([
                'prename' => $request['prename'],
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'level' => $request['level'],
                'position' => $request['position'],
                'phone' => $request['phone'],
                'line' => $request['line'],
                'img' => $sub,
                'email' => $request['email'],
                'password' => Hash::make($request['phone'])
            ]);
        }else {
            $trainee =  User::create([
                'prename' => $request['prename'],
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'level' => $request['level'],
                'position' => $request['position'],
                'phone' => $request['phone'],
                'line' => $request['line'],
                'email' => $request['email'],
                'password' => Hash::make($request['phone'])
            ]);
        }    

           
        if(count($request->leave) > 0)
		{
			foreach ($request->leave as $key =>$value ) {
				if($value != "")
				{     
                    $data = AmountLeave::create([
                        'leave_name' => $value,
                        'amount_num' => $request->amount_num[$key],
                        'user_id' => $trainee->id,
                    ]);                   
                }
			}
        } 
        return redirect('trainee')->with('add','เพิ่มนักศึกษาฝึกงานสำเร็จ');
    } 



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainee = DB::table('users')
        ->join('positions', 'users.position', '=', 'positions.post_id')
        ->where('users.id', '=', $id)->first();

        $amount = DB::table('users')
        ->join('amount_leaves', 'users.id', '=', 'amount_leaves.user_id')
        ->where('users.id', '=', $id)->get();
        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('user.trainee.show' ,compact('trainee','amount','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::all();

        $trainee = DB::table('users')
        ->join('positions', 'users.position', '=', 'positions.post_id')
        ->where('users.id', '=', $id)->first();

        $amount = DB::table('amount_leaves')
        ->where('user_id', '=', $id)->get();

        $data = AddLeave::all()->where('status',0)->COUNT('status');
        return view('user.trainee.edit' ,compact('trainee','amount','id','position','data'));
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
        // dd($request, $id);
        $this->validate($request,[
            'prename' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'line' => 'required',
            'email' => 'required|email|max:255',
        ]);

        if (!$request->img == null) {
            $path = $request->file('img')->store('public/img');
            $sub = str_replace("public","storage" , $path);
                
            DB::table('users')
            ->where('users.id', $id)
            ->update([
                'prename' => $request['prename'],
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'level' => $request['level'],
                'position' => $request['position'], 
                'phone' => $request['phone'],
                'line' => $request['line'],
                'email' => $request['email'],
                'img' => $sub,
                'password' => Hash::make($request['phone'])
            ]);
        }else {
            DB::table('users')
            ->where('users.id', $id)
            ->update([
                'prename' => $request['prename'],
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'level' => $request['level'],
                'position' => $request['position'], 
                'phone' => $request['phone'],
                'line' => $request['line'],
                'email' => $request['email'],
                'password' => Hash::make($request['phone'])
            ]);
        }    

        if(count($request->leave) > 0)
		{
			foreach ($request->leave as $key =>$value ) {
				if($value != "")
				{         
                    DB::table('amount_leaves')
                        ->where('amount_leaves.user_id', $id)
                        ->update([
                            'leave_name' => $value,
                            'amount_num' => $request->amount_num[$key]
                    ]);

                }
			}
        }

        
        return redirect('trainee')->with('update','แก้ไขข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          DB::table('users')->where('users.id', '=', $id)->delete();
          DB::table('amount_leaves')->where('amount_leaves.user_id', '=', $id)->delete();
        return redirect('trainee')->with('del', 'ลบข้อมูลเรียบร้อย');
    }
}
