<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogDelete extends Component
{
    public $showDeleteModel = false;
    public $showRestoreModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel','showRestoreModel','showForceDeleteModel'];

    public function showDeleteModel($itemId){
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel(){
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete(){
        $blog = Blog::findOrFail($this->itemId);
        $blog->delete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
    }

    public function showRestoreModel($itemId){
        $this->itemId = $itemId;
        $this->showRestoreModel = true;
    }

    public function closeRestoreModel(){
        $this->showRestoreModel = false;
        $this->reset();
    }
    public function restore(){
        $blog = Blog::onlyTrashed()->findOrFail($this->itemId);
        $blog->restore();
        $this->reset();
        $this->closeRestoreModel();
        $this->emit('refreshParent');
    }

    public function showForceDeleteModel($itemid){
        $this->itemId = $itemid;
        $this->showForceDeleteModel = true;
    }
    public function closeForceDeleteModel(){
        $this->showForceDeleteModel = false;
        $this->reset();
    }

    public function forceDelete(){
        $blog = Blog::onlyTrashed()->findOrFail($this->itemId);
        $blog->forceDelete();
        $this->reset();
        $this->closeForceDeleteModel();
        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.blog.blog-delete');
    }
}
