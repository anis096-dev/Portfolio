<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Knowledge;
use Livewire\WithFileUploads;

class BlogCreate extends Component
{
    use WithFileUploads;

    public $title, $desc, $topic, $user_id, $imagePath;
    public $knowledges;
    
    protected $listeners = ['showCreateModel'];
    public bool $showCreateModel = false;

    protected function rules()
    {
        return [
            'title' => ['required', 'string', 'max:100', 'min:10'],
            'desc' => ['required', 'string', 'min:250'],
            'topic' => 'required',
            'user_id' => 'required|integer',
            'imagePath' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
        ];
    }

    public function mount()
    {
    $this->user_id = auth()->id();
    $this->knowledges = Knowledge::all();
    }

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    public function cleanVars()
    {
        $this->title ='';
        $this->desc  = '';
        $this->topic  = '';
        $this->imagePath  = '';
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
            'title' => $this->title,
            'desc' => $this->desc,
            'topic' => $this->topic,
            'user_id' => $this->user_id,
            'image' => $this->imagePath,
        ];

        if (!empty($this->imagePath)) {
            $icon_path = $this->imagePath->store('image_uploads', 'public');
            $data['image'] = $icon_path;
        }

        Blog::create($data);
        $this->closeCreateModel();
        $this->emit('refreshParent');

    }

    public function updatedImagePath()
    {
        $this->validate([
            'imagePath' => 'image|mimes:png,jpg,jpeg|max:1024',
        ]);
    }
    
    public function render()
    {
        return view('livewire.blog.blog-create');
    }
}
