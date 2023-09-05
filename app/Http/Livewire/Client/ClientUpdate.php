<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientUpdate extends Component
{
    use WithFileUploads;

    public $itemId;
    public $name, $user_id, $logo, $logoPath;

    protected $listeners = ['showUpdateModel'];
    public bool $showUpdateModel = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'user_id' => 'required|integer',
            'logoPath' => 'nullable|image|mimes:png|max:1024',
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
            $item = Client::find($this->itemId);
            $this->name = $item->name;
            $this->user_id = $item->user_id;
            $this->logo = $item->logo;
        }
    }

    public function cleanVars()
    {
        $this->name ='';
        $this->logoPath  = '';
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
            'name' => $this->name,
            'user_id' => $this->user_id,
        ];

        if (!empty($this->logoPath)) {
            $logo_path = $this->logoPath->store('image_uploads', 'public');
            $data['logo'] = $logo_path;
        }

        Client::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->emit('refreshParent');
    }

    public function updatedLogoPath()
    {
        $this->validate([
            'logoPath' => 'image|mimes:png|max:1024',
        ]);
    }
    
    public function render()
    {
        return view('livewire.client.client-update');
    }
}
