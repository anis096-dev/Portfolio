<?php

namespace App\Http\Livewire\Work;

use App\Models\Work;
use Livewire\Component;

class WorkDelete extends Component
{
    public $showDeleteModel = false;
    public $showRestoreModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel', 'showRestoreModel', 'showForceDeleteModel'];

    public function showDeleteModel($itemId)
    {
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel()
    {
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete()
    {
        $work = Work::findOrFail($this->itemId);
        $work->delete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
    }

    public function showRestoreModel($itemId)
    {
        $this->itemId = $itemId;
        $this->showRestoreModel = true;
    }

    public function closeRestoreModel()
    {
        $this->showRestoreModel = false;
        $this->reset();
    }
    public function restore()
    {
        $work = Work::onlyTrashed()->findOrFail($this->itemId);
        $work->restore();
        $this->reset();
        $this->closeRestoreModel();
        $this->emit('refreshParent');
    }

    public function showForceDeleteModel($itemid)
    {
        $this->itemId = $itemid;
        $this->showForceDeleteModel = true;
    }
    public function closeForceDeleteModel()
    {
        $this->showForceDeleteModel = false;
        $this->reset();
    }

    public function forceDelete()
    {
        $work = Work::onlyTrashed()->findOrFail($this->itemId);
        $work->forceDelete();
        $this->reset();
        $this->closeForceDeleteModel();
        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.work.work-delete');
    }
}
