<?php

namespace App\Http\Livewire\Skill;

use App\Models\Skill;
use Livewire\Component;
use Livewire\WithPagination;

class SkillIndex extends Component
{
    use WithPagination;

    public $name, $desc, $rate, $user_id, $icon;

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
        $skills = Skill::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $skills = $skills->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed){
            $skills = $skills->onlyTrashed();
        }else{
            $skills = $skills->withCount('user:id');
        }
        $skills = $skills->paginate($this->perPage);
        return $skills;
    }

    public function render()
    {
        return view('livewire.skill.skill-index', [
            'skills' => $this->readyToLoad ? $this->getItem() : [],
        ])->layout('layouts.app');
    }
}
