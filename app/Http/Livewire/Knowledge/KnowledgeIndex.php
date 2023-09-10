<?php

namespace App\Http\Livewire\Knowledge;

use App\Models\Knowledge;
use Livewire\Component;

class KnowledgeIndex extends Component
{
    public $knowledges, $user_id;

    protected $rules =[
        'knowledges.*.name' => 'required',
        'user_id' => 'required|integer',
    ];

    public function mount()
    {
        $this->knowledges = Knowledge::all();
        $this->user_id = auth()->id();
    }

    public function add()
    {
        $this->knowledges->push(Knowledge::make());
    }

    public function save()
    {
        $this->validate();
        foreach ($this->knowledges as $knowledge){
            $knowledge['user_id'] = $this->user_id;
            $knowledge->save();
        };
    }

    public function delete($index)
    {
        $knowledge = $this->knowledges[$index];
        $this->knowledges->forget($index); 
        
        $knowledge->delete();
    }

    public function render()
    {
        return view('livewire.knowledge.knowledge-index');
    }
}
