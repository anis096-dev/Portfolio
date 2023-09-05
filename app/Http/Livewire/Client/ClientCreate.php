<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientCreate extends Component
{
    use WithFileUploads;

    public $name, $user_id, $logoPath;
    
    protected $listeners = ['showCreateModel'];
    public bool $showCreateModel = false;

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

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    public function cleanVars()
    {
        $this->name ='';
        $this->logoPath  = '';
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
            'name' => $this->name,
            'user_id' => $this->user_id,
            'logo' => $this->logoPath,
        ];

        if (!empty($this->logoPath)) {
            $icon_path = $this->logoPath->store('image_uploads', 'public');
            $data['logo'] = $icon_path;
        }

        Client::create($data);
        $this->closeCreateModel();
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
        return view('livewire.client.client-create');
    }
}
