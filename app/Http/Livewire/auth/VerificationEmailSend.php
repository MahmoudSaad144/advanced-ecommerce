<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Mail\verification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class VerificationEmailSend extends Component
{

    public $verification_done ;
    public function mount(){
        if (isset(request()->token) && request()->token == session()->get('token')) {
            $verification_done=User::where('id',auth()->id())->update(['email_verified_at'=>now(),]);
        }
        if (isset($verification_done)) {
            $this->verification_done = $verification_done;
        }
    }
    public function verificationHandeler(){
        $user=User::find(auth()->id());
        $email = $user->email;
        $name = $user->name;
        $verification = $user->email_verified_at;
        if ($verification == null) {
            $token= base64_encode(Str::random(64));
            session()->put('token', $token);
            $link = route('verification',['token'=>$token,'email'=>$email]);
            Mail::to($email)->send(new verification($link,$email,$name));
            session()->flash('success', 'We have sent you a link to activate your account again. Please check your email');
        }else {
            $this->verification_done = 'done';
        }
    }
    public function render()
    {

        return view('livewire.auth.verification-email-send');

    }
}
