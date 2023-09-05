<?php

namespace App\Http\Livewire\Education;

use App\Models\Education;
use Livewire\Component;

class EducationCreate extends Component
{
    public $formation, $institute, $adress, $user_id, $Date_of_obtaining;
    
    protected $listeners = ['showCreateModel'];
    public bool $showCreateModel = false;

    protected function rules()
    {
        return [
            'formation' => ['required', 'string', 'max:50', 'min:5'],
            'institute' => ['required', 'string', 'min:5', 'max:50'],
            'adress' => ['required', 'string', 'min:5', 'max:50'],
            'Date_of_obtaining' => 'required',
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
        $this->formation ='';
        $this->institute  = '';
        $this->adress  = '';
        $this->Date_of_obtaining  = '';
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
            'formation' => $this->formation,
            'institute' => $this->institute,
            'adress' => $this->adress,
            'user_id' => $this->user_id,
            'Date_of_obtaining' => $this->Date_of_obtaining,
        ];

        Education::create($data);
        $this->closeCreateModel();
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.education.education-create');
    }
}
