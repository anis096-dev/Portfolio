<?php

namespace App\Http\Livewire\Education;

use App\Models\Education;
use Livewire\Component;
use Livewire\WithPagination;

class EducationIndex extends Component
{
    use WithPagination;

    public $formation, $institute, $adress, $user_id, $Date_of_obtaining;

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
        $educations = Education::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $educations = $educations->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed){
            $educations = $educations->onlyTrashed();
        }else{
            $educations = $educations->withCount('user:id');
        }
        $educations = $educations->paginate($this->perPage);
        return $educations;
    }

    public function render()
    {
        return view('livewire.education.education-index', [
             'educations' => $this->readyToLoad ? $this->getItem() : [],
        ])->layout('layouts.app');
    }
}
