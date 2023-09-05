<?php

namespace App\Http\Livewire\Portfolio;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;

class PortfolioContact extends Component
{

    public $name;
    public $email;
    public $message;
    
    public $user;

    public function mount(){
        $this->user = User::where('id', 1)
        ->first();
    }
    

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'message' => 'required|min:15|max:250',
    ];

    public function formSubmit()
    {
        try{
            $this->validate();
            $data = array(
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
            );

            // dd($data);

            Mail::to($this->user->email)->send(new ContactFormMailable ($data));

            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Your message was sent Successfuly!!"
            ]);
            $this->reset();
        }
        catch(Exception $e){
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Please fill in the necessary fields!"
            ]);
        }
    }
    
    public function render()
    {
        return view('livewire.portfolio.portfolio-contact')->layout('layouts.main');
    }
}
