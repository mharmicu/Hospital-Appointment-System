<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class ContactForm extends Component
{
    public $name='';
    public $email='';
    public $message='';

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveMessage(){

        $this->validate();

        Message::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->name = '';
        $this->email = '';
        $this->message = '';

        session()->flash('message', 'Feedback sent. Thank you!');
    }

    

    public function render()
    {

        return view('livewire.contact-form');
    }
}
