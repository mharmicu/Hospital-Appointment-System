<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class AdminInbox extends Component
{

    use WithPagination;
    public $searchTerm;

    public function render()
    {

        $searchTerm = '%'.$this->searchTerm . '%';
        $messages = Message::where('id','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('email','LIKE',$searchTerm)
                    ->orWhere('message','LIKE',$searchTerm)
                    ->orderBy('id','ASC')->paginate(10);

        return view('livewire.admin-inbox',['messages'=>$messages]);
    }
}
