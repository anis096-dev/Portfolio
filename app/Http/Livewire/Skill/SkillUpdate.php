<?php

namespace App\Http\Livewire\Skill;

use App\Models\Skill;
use Livewire\Component;
use Livewire\WithFileUploads;

class SkillUpdate extends Component
{
    use WithFileUploads;

    public $itemId;
    public $name, $desc, $rate, $user_id, $icon, $iconPath;

    protected $listeners = ['showUpdateModel'];
    public bool $showUpdateModel = false;

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

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel= true;

        if (!empty($this->itemId)){
            $item = Skill::find($this->itemId);
            $this->name = $item->name;
            $this->desc = $item->desc;
            $this->rate = $item->rate;
            $this->user_id = $item->user_id;
            $this->icon = $item->icon;
        }
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

    public function closeUpdateModel(){
        $this->showUpdateModel= false;
        $this->cleanVars();
    }

    public function edit(){
        $this->validate();

        $data = [
            'name' => $this->name,
            'desc' => $this->desc,
            'rate' => $this->rate,
            'user_id' => $this->user_id,
        ];

        if (!empty($this->iconPath)) {
            $icon_path = $this->iconPath->store('image_uploads', 'public');
            $data['icon'] = $icon_path;
        }

        Skill::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
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
        return view('livewire.skill.skill-update');
    }
}