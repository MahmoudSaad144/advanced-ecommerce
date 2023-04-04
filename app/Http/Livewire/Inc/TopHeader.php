<?php

namespace App\Http\Livewire\Inc;

use App\Models\User;
use Livewire\Component;

class TopHeader extends Component
{
public $user;

protected $listeners = [
    'updateTopHeader'=>'$refresh'
];

    public function mount(){

    $this->user = User::find(auth()->id());

    }



    public function render()
    {
        return view('livewire.inc.top-header');
    }
}
