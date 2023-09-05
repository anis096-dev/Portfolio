<?php

namespace App\Http\Livewire\Work;

use App\Models\User;
use App\Models\Work;
use Livewire\Component;

class WorkShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;
    public $user;

    protected $listeners = ['showItemModel'];

    public function mount()
    {
        $this->user = User::where('id', 1)
            ->first();
    }

    public function showItemModel($itemId)
    {
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Work::with('user')->find($this->itemId);
    }

    public function closeItemModel()
    {
        $this->showItemModel = false;
    }

    public function render()
    {
        return view('livewire.work.work-show');
    }
}
