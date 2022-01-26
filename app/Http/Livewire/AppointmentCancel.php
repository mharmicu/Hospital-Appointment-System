<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AppointmentCancel extends Component
{
    public $name, $email, $hospital_name, $appoint_date, $appoint_time, $status, $ids;
    public $isOpen = 0;
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
                    ->orWhere('hospital_id','LIKE',$searchTerm)
                    ->orWhere('status','LIKE',$searchTerm)
                    ->orWhere('appoint_date','LIKE',$searchTerm)
                    ->orWhere('user_id','LIKE',$searchTerm);
            })
            
            ->orderBy('id','ASC')->paginate(10);  

        return view('livewire.appointment-cancel',['appointments'=>$appointments]);
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
        $this->ids = '';
        $this->status = '';
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
