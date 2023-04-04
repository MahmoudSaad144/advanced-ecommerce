<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccesstokenController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'email'=>'required|email|max:255',
            'password'=>'required|string|min:8',
            'device_name'=>'string|max:255',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $device_name = $request->post('device_name',$request->userAgent());
            $token=$user->createToken($device_name);
            return response()->json([
                'token'=>$token->plainTextToken,
                'user'=>$user,
                'usertype'=>$user->usertype,
                'status'=>'success',
            ], 200);

        }else {
            return response()->json([
                'message'=>'Incorrect login',
                'status'=>'fail',
            ], 401);
        }

    }

    public function destroy(){

        $user = Auth::guard('sanctum')->user();

        /*****to delete from all device */
        // $user->tokens()->delete();
        /*****to delete from this device */

        $logout=$user->currentAccessToken()->delete();

        if ($logout) {
            return response()->json([
                'message'=>'you are logout',
                'status'=>'success',
        ],200);
        }

    }



}
