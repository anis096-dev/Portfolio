<?php

namespace App\Http\Livewire\Education;

use App\Models\Education;
use Livewire\Component;

class EducationUpdate extends Component
{
    public $itemId;
    public $formation, $institute, $adress, $user_id, $Date_of_obtaining;
    
    protected $listeners = ['showUpdateModel'];
    public bool $showUpdateModel = false;

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

     public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel= true;

        if (!empty($this->itemId)){
            $item = Education::find($this->itemId);
            $this->formation = $item->formation;
            $this->institute = $item->institute;
            $this->adress = $item->adress;
            $this->user_id = $item->user_id;
            $this->Date_of_obtaining = $item->Date_of_obtaining;
        }
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

    public function closeUpdateModel(){
        $this->showUpdateModel= false;
        $this->cleanVars();
    }

    public function edit(){
        $this->validate();

         $data = [
            'formation' => $this->formation,
            'institute' => $this->institute,
            'adress' => $this->adress,
            'user_id' => $this->user_id,
            'Date_of_obtaining' => $this->Date_of_obtaining,
        ];

        Education::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->emit('refreshParent');

    }
    
    public function render()
    {
        return view('livewire.education.education-update');
    }
}
