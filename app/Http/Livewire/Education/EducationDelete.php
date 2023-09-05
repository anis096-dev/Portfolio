<?php

namespace App\Http\Livewire\Education;

use Livewire\Component;
use App\Models\Education;

class EducationDelete extends Component
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
        $education = Education::findOrFail($this->itemId);
        $education->delete();
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
        $education = Education::onlyTrashed()->findOrFail($this->itemId);
        $education->restore();
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
        $education = Education::onlyTrashed()->findOrFail($this->itemId);
        $education->forceDelete();
        $this->reset();
        $this->closeForceDeleteModel();
        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.education.education-delete');
    }
}
