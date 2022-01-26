<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;



class AppointmentView extends Component
{
    public $name, $email, $hospital_name, $appoint_date, $appoint_time, $user_id, $hospital_id, $status, $ids, $appointment_id;
    public $isOpen = 0;
    public $isBukas = 0;
    use WithPagination;
    public $search='', $searchTerm;

    public function render()
    {

        $User = Auth::user();
        $logged_in_user = $User->id;
    
        $appointments = Appointment::where('user_id','LIKE',$logged_in_user)
        ->where(function ($query) {
            $searchTerm = '%'.$this->searchTerm . '%';
            $query->where('name','LIKE',$searchTerm)
                    ->orWhere('email','LIKE',$searchTerm)
                    ->orWhere('hospital_name','LIKE',$searchTerm)
                    ->orWhere('status','LIKE',$searchTerm)
                    ->orWhere('appoint_date','LIKE',$searchTerm)
                    ->orWhere('appoint_time','LIKE',$searchTerm)
                    ->orWhere('hospital_id','LIKE',$searchTerm)
                    ->orWhere('user_id','LIKE',$searchTerm);
                })
            
                ->orderBy('id','ASC')->paginate(10);  
    

        return view('livewire.appointment-view',['appointments'=>$appointments]);
    }

    public function bukasModal()
    {
        $this->isBukas = true;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function saraModal()
    {
        $this->isBukas = false;
    }

    public function view($id)
    {
        $appointments = Appointment::findOrFail($id);
        $this->appointment_id = $appointments->id;
        $this->name = $appointments->name;
        $this->email =  $appointments->email;
        $this->hospital_name =  $appointments->hospital_name;  
        $this->appoint_date =  $appointments->appoint_date; 
        $this->appoint_time =  $appointments->appoint_time; 
        $this->hospital_id =  $appointments->hospital_id; 
        $this->user_id =  $appointments->user_id; 
        $this->ids =  $appointments->ids; 
        $this->status =  $appointments->status; 
        
        $this->bukasModal();

        
    }
}