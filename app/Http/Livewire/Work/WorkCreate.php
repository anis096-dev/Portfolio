<?php

namespace App\Http\Livewire\Work;

use App\Models\Work;
use Livewire\Component;
use App\Models\Knowledge;
use App\Models\WorkImages;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class WorkCreate extends Component
{
    use WithFileUploads;

    public $title, $desc, $category, $user_id, $languages, $client, $link, $images = [];
    public $knowledges;

    protected $listeners = ['showCreateModel'];
    public bool $showCreateModel = false;

    protected function rules()
    {
        return [
            'title' => ['required', 'string', 'max:100', 'min:10'],
            'desc' => ['required', 'string', 'min:250'],
            'category' => 'required',
            'languages' => 'required',
            'client' => 'required',
            'link' => 'required',
            'user_id' => 'required|integer',
            'images' => 'required|array|max:2|min:2',
            'images.*' => 'image|max:1024', // 1MB Max
        ];
    }

    public function mount()
    {
        $this->user_id = auth()->id();
        $this->knowledges = Knowledge::all();
    }

    public function showCreateModel()
    {
        $this->showCreateModel = true;
    }

    public function cleanVars()
    {
        $this->title = '';
        $this->desc  = '';
        $this->category  = '';
        $this->languages  = '';
        $this->client  = '';
        $this->link  = '';
        $this->images  = '';
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function closeCreateModel()
    {
        $this->showCreateModel = false;
        $this->cleanVars();
    }

    public function create()
    {
        $this->validate();

        $work = new Work();
        $work->user_id = $this->user_id;
        $work->title = $this->title;
        $work->desc = $this->desc;
        $work->category = $this->category;
        $work->languages = $this->languages;
        $work->client = $this->client;
        $work->link = $this->link;
        $work->save();


        foreach ($this->images as $key => $image) {
            $pimage = new WorkImages();
            $pimage->work_id = $work->id;

            $imageName = Carbon::now()->timestamp . $key . '.' . $this->images[$key]->extension();
            $this->images[$key]->storeAs('all', $imageName);

            $pimage->image = $imageName;
            $pimage->save();
        }

        $this->closeCreateModel();
        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.work.work-create');
    }
}
