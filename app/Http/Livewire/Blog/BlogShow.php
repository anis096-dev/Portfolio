<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use App\Models\User;
use Livewire\Component;

class BlogShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;
    public $user;

    protected $listeners = ['showItemModel'];

    public function mount(){
        $this->user = User::where('id', 1)
        ->first();
    }

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Blog::with('user')->find($this->itemId);

    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
    }

    public function render()
    {
        return view('livewire.blog.blog-show');
    }
}
