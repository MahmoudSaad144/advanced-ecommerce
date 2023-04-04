<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class PersonalDetails extends Component
{
    public $user;
    public $name,$username,$email,$biography;


    public function mount(){
        $this->user = User::find(auth()->id());
        $this->name=$this->user->name;
        $this->username=$this->user->username;
        $this->email=$this->user->email;
        $this->biography=$this->user->biography;
    }

    public function updated(){
        $this->validate([
            'name'=>'required|string',
            'username'=>'required|unique:users,username,'.auth()->id().'',
            'email'=>'required|email',
        ]);
    }
    public function PersonalHandeler(){
        $this->validate([
            'name'=>'required|string',
            'username'=>'required|unique:users,username,'.auth()->id().'',
            'email'=>'required|email',
        ]);

        User::where('id',auth()->id())->update([
            'name'=>$this->name,
            'username'=>$this->username,
            'email'=>$this->email,
            'biography'=>$this->biography,
        ]);

        $this->emit('updateProfileHeader');   //علشان اعمل ايفنت واروح استدعيه في الكموننت التاني علشان التغير اللي حصل يتغير فيه من غير ما الصفحه تتحدث
        $this->emit('updateTopHeader');

        $this->showToastr('Your Profile info has been successfuly updated.','success'); // to make toastr message apear
    }

    public function showToastr($message, $type){ // function to make toastr message apear
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }

    public function render()
    {
        return view('livewire.auth.personal-details');
    }
}
