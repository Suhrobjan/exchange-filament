<?php

namespace App\Livewire\Contacts;

use Livewire\Component;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';
    public $successMessage = false;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        // In a real app, you'd save to DB or send email here
        // For demonstration, we'll just show the success message

        $this->successMessage = true;

        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.contacts.contact-form');
    }
}
