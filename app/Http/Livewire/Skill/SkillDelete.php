<?php

namespace App\Http\Livewire\Skill;

use App\Models\Skill;
use Livewire\Component;

class SkillDelete extends Component
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
        $skill = Skill::findOrFail($this->itemId);
        $skill->delete();
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
        $skill = Skill::onlyTrashed()->findOrFail($this->itemId);
        $skill->restore();
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
        $skill = Skill::onlyTrashed()->findOrFail($this->itemId);
        $skill->forceDelete();
        $this->reset();
        $this->closeForceDeleteModel();
        $this->emit('refreshParent');
    }
    
    public function render()
    {
        return view('livewire.skill.skill-delete');
    }
}
