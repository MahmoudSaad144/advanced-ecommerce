<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Home extends Component
{

public function sayhi(){
    dd('asdasd');
}


    public function render()
    {
        return view('livewire.front.home');
    }
}
