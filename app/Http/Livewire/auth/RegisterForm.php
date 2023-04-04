<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Mail\verification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterForm extends Component
{
public $register_name,$register_username,$register_email,$register_password,$register_confirmpassword;

    public function updated($propertyName){
        $this->validate([
            'register_name'=>'required|min:4|max:25|string',
            'register_username'=>'required|unique:users,username|string|min:4|max:25',
            'register_email'=>'required|email|unique:users,email',
            'register_password'=>'required|min:8|max:25',
            'register_confirmpassword'=>'same:register_password',

        ],[
            'register_name.required'=>'The Name field is required.',
            'register_name.min'=>'The Name must be at least 4 characters.',
            'register_name.max'=>'The Name must not be greater than 25 characters.',
            'register_username.required'=>'The Username field is required.',
            'register_username.min'=>'The Username must be at least 4 characters.',
            'register_username.max'=>'The Username must not be greater than 25 characters.',
            'register_username.unique'=>'The Username has already been taken.',
            'register_email.required'=>'The Email field is required.',
            'register_email.email'=>'The Email must be a valid email address.',
            'register_email.unique'=>'The Email has already been taken.',
            'register_password.required'=>'The Password field is required.',
            'register_password.min'=>'The Password must be at least 4 characters.',
            'register_password.max'=>'The Password must not be greater than 25 characters.',
            'register_confirmpassword.same'=>'The confirm password must be equal the password.',


        ]);

    }

    public function RegisterHandeler(){
        $this->validate([
            'register_name'=>'required|min:4|max:25|string',
            'register_username'=>'required|unique:users,username|string|min:4|max:25',
            'register_email'=>'required|email|unique:users,email',
            'register_password'=>'required|min:8|max:25',
            'register_confirmpassword'=>'same:register_password',

        ],[
            'register_name.required'=>'The Name field is required.',
            'register_name.min'=>'The Name must be at least 4 characters.',
            'register_name.max'=>'The Name must not be greater than 25 characters.',
            'register_username.required'=>'The Username field is required.',
            'register_username.min'=>'The Username must be at least 4 characters.',
            'register_username.max'=>'The Username must not be greater than 25 characters.',
            'register_username.unique'=>'The Username has already been taken.',
            'register_email.required'=>'The Email field is required.',
            'register_email.email'=>'The Email must be a valid email address.',
            'register_email.unique'=>'The Email has already been taken.',
            'register_password.required'=>'The Password field is required.',
            'register_password.min'=>'The Password must be at least 4 characters.',
            'register_password.max'=>'The Password must not be greater than 25 characters.',
            'register_confirmpassword.same'=>'The confirm password must be equal the password.',
        ]);
        $name = $this->register_name;
        $username= $this->register_username;
        $email = $this->register_email;
        $password= Hash::make($this->register_password);
        $query= User::create([
            'name'=>$name,
            'username'=>$username,
            'email'=>$email,
            'password'=>$password,
        ]);
        if ($query) {
            session()->flash('success', 'Your account has been created successfully.Please check your email to activate your account');
            $token= base64_encode(Str::random(64));
            session()->put('token', $token);
            $link = route('verification',['token'=>$token,'email'=>$email]);
            Mail::to($email)->send(new verification($link,$email,$name));
            Auth::login($query);
            return redirect()->route('verification');
            $this->register_name=$this->register_username=$this->register_email=$this->register_password=$this->register_confirmpassword=null;
        }else {
            session()->flash('fail', 'Something went wrong.');
        }
    }
    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
