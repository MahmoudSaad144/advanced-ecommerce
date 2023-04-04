<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
public $old_Password;
public $new_Pas;
public $confirm_Pas;

public function updated($propertyName){
    $this->validate([
        'old_Password'=>['required',function($attribute,$value,$fail){
            if (!Hash::check($value,User::find(auth()->id())->password)) {
                return $fail(_('Your current password is incorrect'));
                    }
                }
        ],
        'new_Pas'=>'required|min:8|max:25',
        'confirm_Pas'=>'same:new_Pas',
    ],[
        'old_Password.required'=>'Enter your current password',
        'new_Pas.required'=>'Enter your current password',
        'new_Pas.max'=>'The new password must not be greater than 25 characters.',
        'new_Pas.min'=>'The new password must be at least 8 characters.',
        'confirm_Pas.same'=>'The confirm password must be equal the new password',
    ]);
}

    public function ChangePasswordHandeler(){

        $this->validate([
            'old_Password'=>['required',function($attribute,$value,$fail){
                if (!Hash::check($value,User::find(auth()->id())->password)) {
                    return $fail(_('Your current password is incorrect'));
                        }
                    }
            ],
            'new_Pas'=>'required|min:8|max:25',
            'confirm_Pas'=>'same:new_Pas',
        ],[
            'old_Password.required'=>'Enter your current password',
            'new_Pas.required'=>'Enter your new password',
            'new_Pas.max'=>'The new password must not be greater than 25 characters.',
            'new_Pas.min'=>'The new password must be at least 8 characters.',
            'confirm_Pas.same'=>'The confirm password must be equal the new password',
        ]);

        $query = User::find(auth()->id())->update([
            'password'=>Hash::make($this->new_Pas),
        ]);
        if ($query) {
            $this->showToastr('Your Password has been successfuly updated.','success');
            $this->old_Password=$this->new_Pas=$this->confirm_Pas = null;
        }else {
            $this->showToastr('Something went wrong.','error');
        }

    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }

    public function render()
    {
        return view('livewire.auth.change-password');
    }
}
