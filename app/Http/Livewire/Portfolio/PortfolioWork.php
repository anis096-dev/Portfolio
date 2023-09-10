<?php

namespace App\Http\Livewire\Portfolio;

use Livewire\Component;
use App\Models\Knowledge;
use App\Models\Work;
use Livewire\WithPagination;

class PortfolioWork extends Component
{
    use WithPagination;
    
    public $modalFormVisible;
    /**
     * Put your custom public properties here!
     */

    public $knowledges;
    public $perPage = 6;
    public $selectedCategory = null;

    /**
     * mount
     *
     * @param  mixed $id
     * @return void
     */
    public function mount()
    {
        $this->knowledges = Knowledge::all();
    }

    public function selectedItem($action ,$itemId = null){
        if ($action == 'show'){
            $this->emit('showItemModel', $itemId);
        }
    }

    /**
     * The searchclear function.
     *
     * @return void
     */
    public function resetFilter()
    {
        $this->selectedCategory= null;
        $this->resetPage();
    }

    public function render()
    { 
        return view('livewire.portfolio.portfolio-work', [
            'data' => Work::Where('category', 'like', '%'.$this->selectedCategory.'%')
            ->paginate($this->perPage),        
            ])->layout('layouts.main');
    }
}