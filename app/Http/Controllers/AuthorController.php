<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AuthorController extends Controller
{
    public function index(Request $request){

        return view('back.pages.front.home');
    }
    public function logout(Request $request){

        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    public function ResetForm (Request $request){
        $data = [
            'title'=>'Reset Password',
            'token'=>$request->token,
            'email'=>$request->email,
        ];
        return view('back.pages.auth.reset', compact('data'));
    }

    function crop(Request $request){
        $user = User::find(auth()->id());
        $file = $request->file('file');
        $path = 'back/dist/img/author/';
        $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';
        $full_path =$path.$new_image_name;
        $old_photo = $user->photo;
        if (!stristr($old_photo,'default-img' ) && File::exists($old_photo)) {
            File::delete($old_photo);
        }
        $upload = $file->move(public_path($path), $new_image_name);
        if($upload){
            $user->update([
                'photo'=>$full_path
            ]);
            return response()->json(['status'=>1, 'msg'=>'Image has been updated successfully.', 'name'=>$new_image_name]);
        }else{
            return response()->json(['status'=>0, 'msg'=>'Something went wrong, try again later']);
        }
    }


}
