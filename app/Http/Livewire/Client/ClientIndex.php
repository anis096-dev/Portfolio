<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientIndex extends Component
{
    use WithPagination;

    public $name, $logo, $user_id;

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
        $clients = Client::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $clients = $clients->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed){
            $clients = $clients->onlyTrashed();
        }else{
            $clients = $clients->withCount('user:id');
        }
        $clients = $clients->paginate($this->perPage);
        return $clients;
    }

    public function render()
    {
        return view('livewire.client.client-index', [
            'clients' => $this->readyToLoad ? $this->getItem() : [],
            ])->layout('layouts.app');
    }
}
