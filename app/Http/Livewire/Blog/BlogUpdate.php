<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Knowledge;
use Livewire\WithFileUploads;

class BlogUpdate extends Component
{
    use WithFileUploads;

    public $itemId, $knowledges;
    public $title, $desc, $topic, $user_id, $image, $imagePath;

    protected $listeners = ['showUpdateModel'];
    public bool $showUpdateModel = false;

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

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel= true;

        if (!empty($this->itemId)){
            $item = Blog::find($this->itemId);
            $this->title = $item->title;
            $this->desc = $item->desc;
            $this->topic = $item->topic;
            $this->user_id = $item->user_id;
            $this->image = $item->image;
        }
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

    public function closeUpdateModel(){
        $this->showUpdateModel= false;
        $this->cleanVars();
    }

    public function edit(){
        $this->validate();

        $data = [
            'title' => $this->title,
            'desc' => $this->desc,
            'topic' => $this->topic,
            'user_id' => $this->user_id,
        ];

        if (!empty($this->imagePath)) {
            $image_path = $this->imagePath->store('image_uploads', 'public');
            $data['image'] = $image_path;
        }

        Blog::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
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
        return view('livewire.blog.blog-update');
    }
}
