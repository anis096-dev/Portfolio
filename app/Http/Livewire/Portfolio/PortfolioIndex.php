<?php

namespace App\Http\Livewire\Portfolio;

use App\Models\User;
use Livewire\Component;

class PortfolioIndex extends Component
{
    public $user;

    public function mount(){
        $this->user = User::first();
    }

    public function render()
    {
        return view('livewire.portfolio.portfolio-index');
    }
}
