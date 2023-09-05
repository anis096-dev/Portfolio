<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;

    public $title, $desc, $topic, $user_id, $image;

    protected $listeners = [ 'refreshParent' => '$refresh'];
    
    public $readyToLoad = false;
    public ?string $term = null;
    public int $perPage = 5;
    public bool $trashed = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function updatingTerm(){
        $this->resetPage();
    }

    public function updatingPerPage(){
        $this->resetPage();
    }

    public function updatingTrashed(){
        $this->resetPage();
    }

    public function selectedItem($action ,$itemId = null){
        if ($action == 'create'){
            $this->emit('showCreateModel');
        }elseif ($action == 'update'){
            $this->emit('showUpdateModel', $itemId);
        }elseif ($action == 'show'){
            $this->emit('showItemModel', $itemId);
        }elseif ($action == 'delete'){
            $this->emit('showDeleteModel', $itemId);
        }elseif ($action == 'restore'){
            $this->emit('showRestoreModel', $itemId);
        }elseif ($action == 'forceDelete'){
            $this->emit('showForceDeleteModel', $itemId);
        }
    }

    public function getItem(){
        $blogs = Blog::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $blogs = $blogs->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed){
            $blogs = $blogs->onlyTrashed();
        }else{
            $blogs = $blogs->withCount('user:id');
        }
        $blogs = $blogs->paginate($this->perPage);
        return $blogs;
    }

    public function render()
    {
        return view('livewire.blog.blog-index', [
            'blogs' => $this->readyToLoad ? $this->getItem() : [],
        ])->layout('layouts.app');
    }
}
