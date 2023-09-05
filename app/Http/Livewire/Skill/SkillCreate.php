<?php

namespace App\Http\Livewire\Skill;

use App\Models\Skill;
use Livewire\Component;
use Livewire\WithFileUploads;

class SkillCreate extends Component
{
    use WithFileUploads;

    public $name, $desc, $rate, $user_id, $iconPath;
    
    protected $listeners = ['showCreateModel'];
    public bool $showCreateModel = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'desc' => ['required', 'string', 'min:5', 'max:250'],
            'rate' => 'required',
            'user_id' => 'required|integer',
            'iconPath' => 'nullable|image|mimes:png|max:1024',
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
        $this->desc  = '';
        $this->rate  = '';
        $this->iconPath  = '';
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
            'desc' => $this->desc,
            'rate' => $this->rate,
            'user_id' => $this->user_id,
            'icon' => $this->iconPath,
        ];

        if (!empty($this->iconPath)) {
            $icon_path = $this->iconPath->store('image_uploads', 'public');
            $data['icon'] = $icon_path;
        }

        Skill::create($data);
        $this->closeCreateModel();
        $this->emit('refreshParent');

    }

    public function updatedIconPath()
    {
        $this->validate([
            'iconPath' => 'image|mimes:png|max:1024',
        ]);
    }

    public function render()
    {
        return view('livewire.skill.skill-create');
    }
}
