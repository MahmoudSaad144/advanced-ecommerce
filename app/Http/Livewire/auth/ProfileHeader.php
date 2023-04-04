<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class ProfileHeader extends Component
{
public $user;
public $photo;
protected $listeners = [
    'updateProfileHeader'=>'$refresh'
];

public function mount(){

    $this->user = User::find(auth()->id());

}

    public function render()
    {
        return view('livewire.auth.profile-header');
    }
}
