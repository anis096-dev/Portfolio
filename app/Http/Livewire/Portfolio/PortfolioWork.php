<?php

namespace App\Http\Livewire\Portfolio;

use App\Models\User;
use Livewire\Component;
use App\Models\Knowledge;

class PortfolioWork extends Component
{
    public $user, $knowledges;

    public function mount(){
        $this->user = User::where('id', 1)
        ->with(['works'])
        ->first();
       
        $this->knowledges = Knowledge::all();
    }

    public function selectedItem($action ,$itemId = null){
        if ($action == 'show'){
            $this->emit('showItemModel', $itemId);
        }
    }
    
    public function render()
    {
        return view('livewire.portfolio.portfolio-work')->layout('layouts.main');
    }
}