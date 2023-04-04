<?php

namespace App\Http\Livewire\Auth;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotForm extends Component
{
    public $email;

    public function updated($propertyName){

        $this->validate([
            'email'=>'required|email|exists:users,email',
        ],[
            'email.required'=>'Enter Your Email Address',
            'email.email'=>'Invild Email Address',
            'email.exists'=>'This Email Is Not Registered In Data Base'
        ]);

    }

    public function ResetHandeler(){
        $this->validate([
                        'email'=>'required|email|exists:users,email',
                    ],[
                        'email.required'=>'Enter Your Email Address',
                        'email.email'=>'Invild Email Address',
                        'email.exists'=>'This Email Is Not Registered In Data Base'
                    ]);
                    $email = $this->email;
                if ( isset($email)) {
                    $token= base64_encode(Str::random(64));
                    DB::table('password_resets')->insert([
                        'email'=>$this->email,
                        'token'=>$token,
                        'created_at'=>Carbon::now(),
                    ]);
                    $username = User::where('email',$this->email)->pluck('name');
                    $link = route('reset-form',['token'=>$token,'email'=>$this->email]);

                    Mail::to($email)->send(new ResetPassword($username,$link,$email));
                    session()->flash('success','We have sent you an email to reset your password ');
                    $this->email = null;
                }
    }



    public function render()
    {
        return view('livewire.auth.forgot-form');
    }
}
