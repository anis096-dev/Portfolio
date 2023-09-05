<?php

namespace App\Http\Livewire\Experience;

use Livewire\Component;
use App\Models\Experience;

class ExperienceDelete extends Component
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
        $experience = Experience::findOrFail($this->itemId);
        $experience->delete();
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
        $experience = Experience::onlyTrashed()->findOrFail($this->itemId);
        $experience->restore();
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
        $experience = Experience::onlyTrashed()->findOrFail($this->itemId);
        $experience->forceDelete();
        $this->reset();
        $this->closeForceDeleteModel();
        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.experience.experience-delete');
    }
}
