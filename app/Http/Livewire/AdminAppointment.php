<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\PersonalInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAppointment extends Component
{
    public $name, $email, $hospital_name, $appoint_date, $appoint_time, $user_id, $hospital_id, $status, $ids, $appointment_id;
    public $sex, $age, $address, $contactnum;
    public $isOpen = 0;
    public $isBukas = 0;
    use WithPagination;
    public $search='', $searchTerm;

    public function render()
    {
        $User = Auth::user();
        $assigned_hospital = $User->hospital_id;

        $appointments = Appointment::where('hospital_id','LIKE',$assigned_hospital)
            ->where(function ($query) {
                $searchTerm = '%'.$this->searchTerm . '%';
                $query->where('name','LIKE',$searchTerm)
                    ->orWhere('email','LIKE',$searchTerm)
                    ->orWhere('hospital_name','LIKE',$searchTerm)
                    ->orWhere('hospital_id','LIKE',$searchTerm)
                    ->orWhere('status','LIKE',$searchTerm)
                    ->orWhere('appoint_date','LIKE',$searchTerm)
                    ->orWhere('appoint_time','LIKE',$searchTerm)
                    ->orWhere('user_id','LIKE',$searchTerm);
            })
            
            ->orderBy('id','ASC')->paginate(10);

        return view('livewire.admin-appointment',['appointments'=>$appointments]);
    }

    public function bukasModal()
    {
        $this->isBukas = true;
    }

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

    


    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function appointmentcreate()
    {
        $this->resetInputFields();
        $this->openModal();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->hospital_name='';
        $this->appoint_date = '';
        $this->appoint_time = '';
        $this->status = '';
        $this->ids = '';
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'hospital_name'=> 'required',
            'appoint_date' => 'required|date_format:Y-m-d',
            'appoint_time'=> 'required',
            'status' => 'required',
        ]);
    
        Appointment::updateOrCreate(['id' => $this->ids], [
            'name' => $this->name,
            'email' => $this->email,
            'hospital_name' => $this->hospital_name,
            'appoint_date' => $this->appoint_date,
            'appoint_time' => $this->appoint_time,
            'status' => $this->status,

        ]);
   
        session()->flash('message', 
            $this->ids ? 'Appointment Updated Successfully.' : 'Appointment Created Successfully.');
   
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $Appointment = Appointment::findOrFail($id);
        $this->ids = $id;
        $this->name = $Appointment->name;
        $this->email = $Appointment->email;
        $this->hospital_name = $Appointment->hospital_name;
        $this->appoint_date = $Appointment->appoint_date;
        $this->appoint_time = $Appointment->appoint_time;
        $this->status = $Appointment->status;
     
        $this->openModal();
    }

    
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Appointment::find($id)->delete();
        session()->flash('message', 'Appointment Deleted Successfully.');
    }
}
