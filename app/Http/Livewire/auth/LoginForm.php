<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
public $login_id,$password;



public function updated($propertyName)
{
$filedType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' :'username';
        if ($filedType == 'email') {
            $this->validate([
                'login_id'=>'required|email|exists:users,email',
                'password'=>'required|min:8',
            ],[
                'login_id.required'=>'Enter Your Email Or userName',
                'login_id.email'=>'Invild Email Address',
                'login_id.exists'=>'This Email Is Not Registered In Data Base',
                'password.required'=>'Enter Your Password',
            ]);
        }else{
            $this->validate([
                'login_id'=>'required|exists:users,username',
                'password'=>'required|min:8',
            ],[
                'login_id.required'=>'Enter Your Email Or userName',
                'login_id.email'=>'Invild Email Or userName',
                'login_id.exists'=>'This userName Is Not Registered In Data Base',
                'password.required'=>'Enter Your Password',
            ]);
        }
}


    Public function LoginHandeler(){
        /********************لو عايز اعمل تسجيل الدخول عن طريق اميل او يوزر نيم ************ */
        $filedType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' :'username';
        if ($filedType == 'email') {
            $this->validate([
                'login_id'=>'required|email|exists:users,email',
                'password'=>'required|min:8',
            ],[
                'login_id.required'=>'Enter Your Email Or userName',
                'login_id.email'=>'Invild Email Address',
                'login_id.exists'=>'This Email Is Not Registered In Data Base',
                'password.required'=>'Enter Your Password',
            ]);
        }else{
            $this->validate([
                'login_id'=>'required|exists:users,username',
                'password'=>'required|min:8',
            ],[
                'login_id.required'=>'Enter Your Email Or userName',
                'login_id.email'=>'Invild Email Or userName',
                'login_id.exists'=>'This userName Is Not Registered In Data Base',
                'password.required'=>'Enter Your Password',
            ]);
        }

        $data = array($filedType => $this->login_id, 'password' => $this->password);

    if (Auth::guard('web')->attempt($data)) {
        $checkUser = User::where($filedType,$this->login_id)->first();

        if ($checkUser->blocked == 1) {
            Auth::guard('web')->logout();
            return redirect()->route('login')->with('fail','Your Account Has Been Blocked');
        }else {

            return redirect()->route('home');
        }


    }else {
        session()->flash('fail', 'Incorrect  Email/UserName  Or Password');
    }

    }


    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
