<?php

namespace App\Http\Livewire\Portfolio;

use App\Models\User;
use Livewire\Component;

class PortfolioResume extends Component
{
    public $user;

    public function mount(){
        $this->user = User::where('id', 1)
        ->with(['skills'])
        ->with(['knowledges'])
        ->with(['educations'])
        ->with(['experiences'])
        ->first();
    }
    
    public function render()
    {
        return view('livewire.portfolio.portfolio-resume')->layout('layouts.main');
    }
}
