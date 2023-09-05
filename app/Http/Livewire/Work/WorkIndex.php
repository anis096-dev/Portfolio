<?php

namespace App\Http\Livewire\Work;

use App\Models\Work;
use Livewire\Component;
use Livewire\WithPagination;

class WorkIndex extends Component
{
    use WithPagination;

    public $title, $desc, $category, $user_id, $images, $languages, $client, $link;

    protected $listeners = ['refreshParent' => '$refresh'];

    public $readyToLoad = false;
    public ?string $term = null;
    public int $perPage = 5;
    public bool $trashed = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function updatingTerm()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingTrashed()
    {
        $this->resetPage();
    }

    public function selectedItem($action, $itemId = null)
    {
        if ($action == 'create') {
            $this->emit('showCreateModel');
        } elseif ($action == 'update') {
            $this->emit('showUpdateModel', $itemId);
        } elseif ($action == 'show') {
            $this->emit('showItemModel', $itemId);
        } elseif ($action == 'delete') {
            $this->emit('showDeleteModel', $itemId);
        } elseif ($action == 'restore') {
            $this->emit('showRestoreModel', $itemId);
        } elseif ($action == 'forceDelete') {
            $this->emit('showForceDeleteModel', $itemId);
        }
    }

    public function getItem()
    {
        $works = Work::query();
        // * Search
        if (!empty($this->term) && $this->term != null) {
            $works = $works->search(trim($this->term));
        }
        // * Trashed
        if ($this->trashed) {
            $works = $works->onlyTrashed();
        } else {
            $works = $works->withCount('user:id');
        }
        $works = $works->paginate($this->perPage);
        return $works;
    }

    public function render()
    {
        return view('livewire.work.work-index', [
            'works' => $this->readyToLoad ? $this->getItem() : [],
        ])->layout('layouts.app');
    }
}
