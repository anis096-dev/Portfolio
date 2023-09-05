<?php

namespace App\Http\Livewire\Portfolio;

use App\Models\User;
use Livewire\Component;

class PortfolioAbout extends Component
{
    public $user;

    public function mount(){
        $this->user = User::where('id', 1)
        ->with(['skills'])
        ->with(['clients'])
        ->first();
    }
    
    public function render()
    {
        return view('livewire.portfolio.portfolio-about')->layout('layouts.main');
    }
}
