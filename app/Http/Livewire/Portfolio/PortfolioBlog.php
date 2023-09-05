<?php

namespace App\Http\Livewire\Portfolio;

use App\Models\User;
use Livewire\Component;

class PortfolioBlog extends Component
{
    public $user;

    public function mount(){
        $this->user = User::where('id', 1)
        ->with(['blogs'])
        ->first();
    }

    public function selectedItem($action ,$itemId = null){
        if ($action == 'show'){
            $this->emit('showItemModel', $itemId);
        }
    }
    
    public function render()
    {
        return view('livewire.portfolio.portfolio-blog')->layout('layouts.main');
    }
}
