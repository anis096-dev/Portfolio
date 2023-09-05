<?php

namespace App\Http\Livewire\Experience;

use App\Models\Experience;
use Livewire\Component;

class ExperienceCreate extends Component
{
    public $occupation, $company, $adress, $user_id, $start_date, $end_date;
    
    protected $listeners = ['showCreateModel'];
    public bool $showCreateModel = false;

    protected function rules()
    {
        return [
            'occupation' => ['required', 'string', 'max:50', 'min:5'],
            'company' => ['required', 'string', 'min:5', 'max:50'],
            'adress' => ['required', 'string', 'min:5', 'max:50'],
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'required|integer',
        ];
    }

    public function mount()
    {
    $this->user_id = auth()->id();
    }

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    public function cleanVars()
    {
        $this->occupation ='';
        $this->company  = '';
        $this->adress  = '';
        $this->start_date  = '';
        $this->end_date  = '';
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->cleanVars();
    }

    public function create(){
        $this->validate();

         $data = [
            'occupation' => $this->occupation,
            'company' => $this->company,
            'adress' => $this->adress,
            'user_id' => $this->user_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];

        Experience::create($data);
        $this->closeCreateModel();
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.experience.experience-create');
    }
}
