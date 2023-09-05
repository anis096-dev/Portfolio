<?php

namespace App\Http\Livewire\Experience;

use Livewire\Component;
use App\Models\Experience;
use Livewire\WithPagination;

class ExperienceIndex extends Component
{
    use WithPagination;

    public $occupation, $company, $adress, $user_id, $start_date, $end_date;

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
        $experiences = Experience::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $experiences = $experiences->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed){
            $experiences = $experiences->onlyTrashed();
        }else{
            $experiences = $experiences->withCount('user:id');
        }
        $experiences = $experiences->paginate($this->perPage);
        return $experiences;
    }

    public function render()
    {
        return view('livewire.experience.experience-index', [
             'experiences' => $this->readyToLoad ? $this->getItem() : [],
        ])->layout('layouts.app');
    }
}
