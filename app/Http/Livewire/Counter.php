<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $num = 3;
    public function increment()
    {
        $this->num++;

    }
    public function decrement()
    {
        $this->num--;

    }
    public function render()
    {
        return view('livewire.counter', ['num' => $this->num]);
    }
}