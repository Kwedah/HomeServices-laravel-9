<?php

namespace App\Http\Livewire\Admin;

use App\models\Contact;
use Livewire\Component;

class AdminContactComponent extends Component
{
    public function render()
    {
        $contacts = Contact::paginate(15);
        return view('livewire.admin.admin-contact-component',['contacts'=>$contacts])->layout('layouts.base');
    }
}