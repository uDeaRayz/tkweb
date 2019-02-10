<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AmountLeave;
use Illuminate\Support\Facades\Hash;

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
}
