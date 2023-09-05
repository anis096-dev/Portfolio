<?php

namespace App\Http\Livewire\Experience;

use App\Models\Experience;
use Livewire\Component;

class ExperienceUpdate extends Component
{
    public $itemId;
    public $occupation, $company, $adress, $user_id, $start_date, $end_date;
    
    protected $listeners = ['showUpdateModel'];
    public bool $showUpdateModel = false;

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

     public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel= true;

        if (!empty($this->itemId)){
            $item = Experience::find($this->itemId);
            $this->occupation = $item->occupation;
            $this->company = $item->company;
            $this->adress = $item->adress;
            $this->user_id = $item->user_id;
            $this->start_date = $item->start_date;
            $this->end_date = $item->end_date;
        }
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

    public function closeUpdateModel(){
        $this->showUpdateModel= false;
        $this->cleanVars();
    }

    public function edit(){
        $this->validate();

         $data = [
            'occupation' => $this->occupation,
            'company' => $this->company,
            'adress' => $this->adress,
            'user_id' => $this->user_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];

        Experience::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.experience.experience-update');
    }
}
