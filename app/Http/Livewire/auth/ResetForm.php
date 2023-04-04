<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetForm extends Component
{
public $email,$token,$newpassword,$confirmpassword;


    public function mount(){
        $this->email = request()->email;
        $this->token = request()->token;
    }

    public function updated($propertyName){
        $this->validate([
            'email'=>'required|email|exists:users,email',
            'newpassword'=>'required|min:8',
            'confirmpassword'=>'same:newpassword',
        ],[
            'email.required'=>'Enter Your Email',
            'email.email'=>'Invild Email Address',
            'email.exists'=>'This Email Is Not Registered In Data Base',
            'newpassword'=>'Enter Your New Password',
            'newpassword.min'=> 'Your Password Must Be Bigger Than 8 Character',
            'confirmpassword.same'=>'The Confirm New Password and new Password Must Match'
        ]);
    }
    public function ResetHandeler(){
        $this->validate([
            'email'=>'required|email|exists:users,email',
            'newpassword'=>'required|min:8',
            'confirmpassword'=>'same:newpassword',
        ],[
            'email.required'=>'Enter Your Email',
            'email.email'=>'Invild Email Address',
            'email.exists'=>'This Email Is Not Registered In Data Base',
            'newpassword'=>'Enter Your New Password',
            'newpassword.min'=> 'Your Password Must Be Bigger Than 8 Character',
            'confirmpassword.same'=>'The Confirm New Password and new Password Must Match'
        ]);

        $checktoken=DB::table('password_resets')->where(['email'=>$this->email, 'token'=>$this->token ])->first();

        if (!$checktoken) {
            session()->flash('fail', 'Invaild Token');
        }else {
            User::where('email',$this->email)->update([
                'password'=>Hash::make($this->newpassword)
            ]);
            DB::table('password_resets')->where([
                'email'=>$this->email
                ])->delete();
                $success_token= Str::random(64);
                session()->flash('success', 'Your Password has been updated successfully. Login with your email (<span>'.$this->email.'</span>) and your new password ');
                return redirect()->route('login', ['tkn' => $success_token , 'UEmail'=>$this->email]);
        }


    }


    public function render()
    {
        return view('livewire.auth.reset-form');
    }
}
