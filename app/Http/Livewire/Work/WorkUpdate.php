<?php

namespace App\Http\Livewire\Work;

use App\Models\Work;
use Livewire\Component;
use App\Models\Knowledge;
use App\Models\WorkImages;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class WorkUpdate extends Component
{
    use WithFileUploads;

    public $title, $desc, $category, $user_id, $work_id, $languages, $client, $link, $images = [];
    public $knowledges;
    public $itemId;

    protected $listeners = ['showUpdateModel'];
    public bool $showUpdateModel = false;

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
            'images' => 'required',
            'images.*' => 'nullable|image|max:1024', // 1MB Max
        ];
    }

    public function mount()
    {
        $this->user_id = auth()->id();
        $this->knowledges = Knowledge::all();
    }

    public function showUpdateModel($itemId)
    {
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)) {
            $item = Work::find($this->itemId);
            $this->work_id = $item->id;
            $this->title = $item->title;
            $this->desc = $item->desc;
            $this->category = $item->category;
            $this->languages = $item->languages;
            $this->client = $item->client;
            $this->link = $item->link;
            $this->user_id = $item->user_id;
        }
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

    public function closeUpdateModel()
    {
        $this->showUpdateModel = false;
        $this->cleanVars();
    }

    public function edit()
    {
        $this->validate();

        Work::where('id', $this->itemId)->update([
            'title' => $this->title,
            'desc' => $this->desc,
            'category' => $this->category,
            'languages' => $this->languages,
            'client' => $this->client,
            'link' => $this->link,
            'user_id' => $this->user_id,
        ]);

        if (!empty($this->images)) {
            foreach ($this->images as $key => $image) {
                $pimage = new WorkImages();
                $pimage->work_id = $this->work_id;

                $imageName = Carbon::now()->timestamp . $key . '.' . $this->images[$key]->extension();
                $this->images[$key]->storeAs('all', $imageName);

                $pimage->image = $imageName;
                $pimage->save();
            }
        }

        $this->closeUpdateModel();
        $this->emit('refreshParent');
    }

    public function deleteImage($id)
    {
        $image = WorkImages::where('id', $id)->first();
        $image->delete();
    }

    public function render()
    {
        return view('livewire.work.work-update');
    }
}
