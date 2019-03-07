<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AmountLeave;
use App\Work;
use App\AddLeave;
use App\Attendance;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    //Login Funtion
    public function login(Request $request)
    {
        $user = User::where('email' , $request->email)
            ->first();
        // Check password 
        if(Hash::check($request->password, $user->password)){
            return response()->json($user, 200);
        }
    }

    // Function Get Amount
    public function amount(Request $request)
    {
        $amount = AmountLeave::where('user_id', $request->user_id)
                ->get();
        return response()->json($amount, 200);
    }

    // Function Get Province
    public function province()
    {
        $province = DB::table('provinces')->orderBy('prov_name','asc')->get();
        return response()->json($province, 200);
    }

    // Function Get District
    public function district(Request $request)
    {
        $district = DB::table('districts')->where('districts.prov_id',$request->prov_id)->get();
        return response()->json($district, 200);
    }

    // Function Get Sub District
    public function subdist(Request $request)
    {
        $subdist = DB::table('subdistricts')->where('subdistricts.dist_id',$request->dist_id)->get();
        return response()->json($subdist, 200);
    }

    // Function บันทึกการทำงานนอกพื้นที่
    public function addWork(Request $request)
    {
        $date = date('Y-m-d');
        $work = Work::create([
            'user_id' => $request['user_id'],
            'place' => $request['place_name'],
            'prov_id' => $request['province'],
            'dist_id' => $request['dist'],
            'subdist_id' => $request['subdist'],
            'detail' => $request['detail'],
            'work_img' => $request['img'],
            'date' => $date
        ]);

        return response()->json($work, 200);
    }

    // Function แสดงข้อมูลบันทึกการทำงานนอกพื้นที่
    public function showWork(Request $request)
    {
        $showWork = DB::table('works')
            ->join('provinces', 'provinces.prov_id', '=', 'works.prov_id')
            ->join('districts', 'districts.dist_id', '=', 'works.dist_id')
            ->join('subdistricts', 'subdistricts.subdist_id', '=', 'works.subdist_id')
            ->where('works.user_id',$request->user_id)->get();
        return response()->json($showWork, 200);
    }

    // Function บันทึกการลา
    public function addLeave(Request $request)
    {
        // $test = $request;
        $addleave = AddLeave::create([
            'user_id' => $request['user_id'],
            'amount_id' => $request['leave_id'],
            'add_type' => $request['type'],
            'date_start' => $request['date_start'],
            'date_end' => $request['date_end'],
            'detail' => $request['detail'],
            'img' => $request['img'],
            'status' => 0
        ]);

        $amount = AmountLeave::where('amount_id','=' ,$request['leave_id'])->first();
        if ($request->type == 1 or 2) {

            $tt=DB::table('add_leaves')->where('add_id','=',$addleave->add_id)->update(['total'=>0.5]);

            $total = $amount->amount_num - 0.5;
            DB::table('amount_leaves')->where('amount_id','=',$request['leave_id'])->update(['amount_num'=>$total]);
        }
        if ($request->type == 3) {

            $diff = AddLeave::select(DB::raw('DATEDIFF(date_end,date_start) as days'))->where('add_id','=',$addleave->add_id)->first();
            $value = $diff->days + 1;

            DB::table('add_leaves')->where('add_id','=',$addleave->add_id)->update(['total'=>$value]);

            $total = $amount->amount_num - $value;
            DB::table('amount_leaves')
            ->where('amount_id','=',$request['leave_id'])
            ->update(['amount_num'=>$total]);
        }
        
        $leave =  AddLeave::where('add_id',$addleave->add_id)->first();
        return response()->json($leave, 200);
    }

    // Function แสดงข้อมูลบันทึกการลา

    public function wait(Request $request)
    {

        $data = DB::table('add_leaves')
        ->join('users', 'users.id', '=', 'add_leaves.user_id')
        ->join('amount_leaves','amount_leaves.amount_id','=','add_leaves.amount_id')
        ->leftJoin('ressons','ressons.resson_id','add_leaves.resson_id')
        ->where('add_leaves.user_id',$request->user_id)
        ->where('add_leaves.status', 0)
        ->orderBy('add_leaves.created_at', 'desc')
        ->get();

        return response()->json($data, 200);
        
    }
    public function notAllow(Request $request)
    {

        $data = DB::table('add_leaves')
        ->join('users', 'users.id', '=', 'add_leaves.user_id')
        ->join('amount_leaves','amount_leaves.amount_id','=','add_leaves.amount_id')
        ->leftJoin('ressons','ressons.resson_id','add_leaves.resson_id')
        ->where('add_leaves.user_id',$request->user_id)
        ->where('add_leaves.status', 2)
        ->orderBy('add_leaves.created_at', 'desc')
        ->get();

        return response()->json($data, 200);
        
    }
    public function Allow(Request $request)
    {

        $data = DB::table('add_leaves')
        ->join('users', 'users.id', '=', 'add_leaves.user_id')
        ->join('amount_leaves','amount_leaves.amount_id','=','add_leaves.amount_id')
        ->leftJoin('ressons','ressons.resson_id','add_leaves.resson_id')
        ->where('add_leaves.user_id',$request->user_id)
        ->where('add_leaves.status', 1)
        ->orderBy('add_leaves.created_at', 'desc')
        ->get();

        return response()->json($data, 200);
        
    }

    // Function บันทึกการเข้าทำงาน
    public function addIn(Request $request)
    {
        $date = date('Y-m-d');
        $time = date('H:i:s');

        $qr = DB::table('qrcode')->where('qr_date',$date)->first();

        if($request->qrcode == $qr->qr_id){
            $atten = Attendance::create([
                'user_id' => $request['user_id'],
                'atten_date' => $date,
                'time_in' => $time,
                // 'img_in' => $request['img'],
            ]);
        }
        return response()->json($atten, 200);
    }

    // Function บันทึกการออกงาน
    public function addOut(Request $request)
    {
        $date = date('Y-m-d');
        $time = date('H:i:s');

        DB::table('attendances')
            ->where('attendances.user_id', $request['user_id'])
            ->where('attendances.atten_date', $date)
            ->update([
                'time_out' => $time,
                'img_out' => $request['img_out'],
            ]);
        
        $time_diff = Attendance::select(DB::raw('TIMESTAMPDIFF(hour,time_in,time_out) as time'))
        ->where('user_id','=',$request['user_id'])
        ->where('attendances.atten_date', $date)
        ->first();   
        
 
        DB::table('attendances')
        ->where('attendances.user_id', $request['user_id'])
        ->where('attendances.atten_date', $date)
        ->update([
            'atten_total' => $time_diff->time
        ]);

        $test_atten = Attendance::where('user_id',$request['user_id'])
                            ->where('attendances.atten_date', $date)
                            ->first();

        return response()->json($time_diff, 200);
    }
    
    // Function แสดงข้อมูลบันทึกการเข้าทำงาน
    public function showTime(Request $request){
        $showTime = DB::table('attendances')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->where('attendances.user_id',$request->user_id)
            ->orderBy('attendances.atten_date', 'desc')
            ->get();
        return response()->json($showTime, 200);
    }

    // Function บันทึกรูป
    function uploadFile(Request $request)
    {
        $json['msg'] = 'Not';
        $filename = '';

        if ($request->hasFile('picture')) {

            $uploadedFile = $request->file('picture');
            $filename = time().$uploadedFile->getClientOriginalName();

            Storage::disk('local')->putFileAs(
                'public/img',
                $uploadedFile,
                $filename
            );
            $json['msg'] = 'hasFile';
        }
        $json['data'] = $filename;

        return response()->json($json, 200);
    }

}
