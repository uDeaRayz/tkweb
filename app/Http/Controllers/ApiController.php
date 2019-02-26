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
    public function login(Request $request){
        $user = User::where('email' , $request->email)
            ->first();
        // Check password 
        if(Hash::check($request->password, $user->password)){
            return response()->json($user, 200);
        }
    }

    // Function Get Amount
    public function amount(Request $request){
        $amount = AmountLeave::where('user_id', $request->user_id)
                ->get();
        return response()->json($amount, 200);
    }

    // Function Get Province
    public function province(){
        $province = DB::table('provinces')->orderBy('prov_name','asc')->get();
        return response()->json($province, 200);
    }

    // Function Get District
    public function district(Request $request){
        $district = DB::table('districts')->where('districts.prov_id',$request->prov_id)->get();
        return response()->json($district, 200);
    }

    // Function Get Sub District
    public function subdist(Request $request){
        $subdist = DB::table('subdistricts')->where('subdistricts.dist_id',$request->dist_id)->get();
        return response()->json($subdist, 200);
    }

    // Function บันทึกการทำงานนอกพื้นที่
    public function addWork(Request $request){

        $work = Work::create([
            'user_id' => $request['user_id'],
            'position' => $request['place_name'],
            'prov_id' => $request['province'],
            'dist_id' => $request['dist'],
            'subdist_id' => $request['subdist'],
            'detail' => $request['detail'],
            'img' => $request['img'],
        ]);

        return response()->json($work, 200);
    }

    // Function แสดงข้อมูลบันทึกการทำงานนอกพื้นที่
    public function showWork(Request $request){
        $showWork = DB::table('works')->where('works.user_id',$request->user_id)->get();
        return response()->json($showWork, 200);
    }

    // Function บันทึกการลา
    public function addLeave(Request $request){
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
        
        $leave =  AddLeave::where('add_id','=',$addleave->add_id)->first();
        return response()->json($leave, 200);
    }

    // Function แสดงข้อมูลบันทึกการลา
    public function showDayoff(Request $request){
        $showDayoff = DB::table('add_leaves')->where('add_leaves.user_id',$request->user_id)->get();
        return response()->json($showDayoff, 200);
    }

    // Function บันทึกการเข้าทำงาน
    public function addAtten(Request $request){
        $atten = Attendance::create([
            'user_id' => $request['user_id'],
            'atten_date' => $request['date'],
            'atten_time' => $request['time'],
            'atten_status' => $request['status'],
            'atten_img' => $request['img'],
        ]);
        return response()->json($atten, 200);
    }

    // Function แสดงข้อมูลบันทึกการเข้าทำงาน
    public function showTime(Request $request){
        $showTime = DB::table('attendances')->where('attendances.user_id',$request->user_id)->get();
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
