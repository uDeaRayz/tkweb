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

    public function amount(Request $request){
        $amount = AmountLeave::where('user_id', $request->user_id)
                ->get();
        return response()->json($amount, 200);
    }

    public function province(){
        $province = DB::table('provinces')->orderBy('prov_name','asc')->get();
        return response()->json($province, 200);
    }

    public function district(Request $request){
        $district = DB::table('districts')->where('districts.prov_id',$request->prov_id)->get();
        return response()->json($district, 200);
    }

    public function subdist(Request $request){
        $subdist = DB::table('subdistricts')->where('districts.prov_id',$request->dist_id)->get();
        return response()->json($subdist, 200);
    }

    public function showTime(Request $request){
        $showTime = DB::table('attendances')->where('attendances.user_id',$request->user_id)->get();
        return response()->json($showTime, 200);
    }

    public function showWork(Request $request){
        $showWork = DB::table('works')->where('works.user_id',$request->user_id)->get();
        return response()->json($showWork, 200);
    }

    public function showDayoff(Request $request){
        $showDayoff = DB::table('add_leaves')->where('add_leaves.user_id',$request->user_id)->get();
        return response()->json($showDayoff, 200);
    }

    public function addWork(Request $request){
        Work::create([
            'user_id' => $request['user_id'],
            'position' => $request['place_name'],
            'prov_id' => $request['prov_id'],
            'dist_id' => $request['dist_id'],
            'subdist_id' => $request['subdist_id'],
            'detail' => $request['detail'],
            'img' => $request['img'],
        ]);
    }

    public function addLeave(Request $request){
        AddLeave::create([
            'user_id' => $request['user_id'],
            'amount_id' => $request['amount_id'],
            'add_type' => $request['type'],
            'date_start' => $request['date_start'],
            'date_end' => $request['date_end'],
            'total' => $request['detail'],
            'img' => $request['img'],
            'status' => 1
        ]);

        $amount = AmountLeave::where('user_id' , 5)
                            ->where('amount_id',7)        
                            ->first();
        if ($request->type == 1 or 2) {
            $total = $amount->amount_num - 0.5;
        }
        if ($request->type == 3) {
            $diff = AddLeave::select(DB::raw('DATEDIFF(date_end,date_start) as days'))->first();
            $total = $amount->amount_num - $diff->days;
        }
        AmountLeave::where('user_id' , 5)
                    ->where('amount_id',7)
                    ->update(['amount_num'=>$total]);
    }


    public function addAtten(Request $request){
        Attendance::create([
            'user_id' => $request['user_id'],
            'atten_date' => $request['date'],
            'atten_time' => $request['time'],
            'atten_status' => $request['status'],
            'atten_img' => $request['img'],
        ]);
    }

    function uploadFile(Request $request)
    {
        
        
        if (!empty($$request->PhotoIn)) {
            $status = "sucess";
            return response()->json($status, 200);
        } else {
            $status = "error";
            return response()->json($status, 200);
        }
        
        // $postdata = file_get_contents("php://input");
        // if(isset($postdata)){
        //     $request = json_decode($postdata);
        //     $postdata['image_base64'] = $request->PhotoIn;
        //     $postdata['ImageName'] = 'imgname';
        //     if(!empty($postdata['image_base64'])){
        //         $img = str_replace('data:image/jpg;base64,','',$postdata['image_base64']);
        //         $img = str_replace(' ', '+', $img);
        //         $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$img));
        //         $target_file = $_SERVER['DOCUMENT_ROOP'].'public/storage/img/pig'.$postdata['ImageName'].'.jpg';

        //         if (file_put_contents($target_file,$data)) {
        //             return response()->json('success', 200);
        //         }else{
        //             return response()->json('error', 200);
        //         }
        //     }
        // }

        // $target_dir = "public/img/";
        // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        // $uploadOk = 1;
        // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // // Check if image file is a actual image or fake image
        // if(isset($_POST["submit"])) {
        //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        //     if($check !== false) {
        //         echo "File is an image - " . $check["mime"] . ".";
        //         $uploadOk = 1;
        //     } else {
        //         echo "File is not an image.";
        //         $uploadOk = 0;
        //     }
        // }


        // $json['msg'] = 'Not';
        // if ($request->hasFile('file')) {
        //     $json['msg'] = 'hasFile';
        // }
        // return response()->json($imageFileType, 200);
    }



    // วันลาคงเหลือ
    // public function date(){
    //     $amount = AmountLeave::where('user_id' , 5)
    //                 ->where('amount_id',7)        
    //                 ->first();
    //     $diff = AddLeave::select(DB::raw('DATEDIFF(date_end,date_start) as days'))->first(); //จำนวนวัน
    //     $diff = AddLeave::select(DB::raw('TIMEDIFF(date_end,date_start) as days'))->first(); //จำนวนชั่วโมง
    //     $total = $amount->amount_num - $diff->days;
    //     AmountLeave::where('user_id' , 5)
    //                 ->where('amount_id',7)
    //                 ->update(['amount_num'=>$total]);
    // }
}
