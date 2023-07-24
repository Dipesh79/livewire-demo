<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class Home extends Component
{
    public $name,$email,$message;

    public $contactId = null;

    protected $listeners = ['deletePrompt'];


    protected $rules = [
        'name'=>['required'],
        'email'=>['required','email'],
        'message'=>['required'],
    ];

    public function store()
    {
        $this->validate();
        Contact::create(
            [
                'name'=>$this->name,
                'email'=>$this->email,
                'message'=>$this->message,
            ]
        );
        $this->reset();
        $this->emit('refreshDatatable');

    }


    public function deletePrompt($key)
    {
        $this->contactId = Contact::find($key)->id;
    }
    public function deleteContact($contactId)
    {
        $contact = Contact::find($contactId);
        $contact->delete();
        $this->emit('refreshDatatable');
    }

    public function render()
    {
        return view('livewire.home');
    }
}
