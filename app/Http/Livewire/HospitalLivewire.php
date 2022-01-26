<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use App\Models\Hospital;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class HospitalLivewire extends Component
{
    public $name, $address, $contactnumber, $beds, $ids;
    public $isOpen = 0;
    use WithPagination;
    public $search = '',  $searchTerm;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $hospitals = Hospital::where('name', 'LIKE', $searchTerm)
            ->orWhere('address', 'LIKE', $searchTerm)
            ->orWhere('contactnumber', 'LIKE', $searchTerm)
            ->orWhere('beds', 'LIKE', $searchTerm)
            ->orderBy('id', 'ASC')->paginate(10);

        return view('livewire.hospital-livewire', ['hospitals' => $hospitals]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function hospitalcreate()
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
    private function resetInputFields()
    {
        $this->name = '';
        $this->address = '';
        $this->contactnumber = '';
        $this->beds = '';
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
            'address' => 'required',
            'contactnumber' => 'required',
            'beds' => 'required',
        ]);

        Hospital::updateOrCreate(['id' => $this->ids], [
            'name' => $this->name,
            'address' => $this->address,
            'contactnumber' => $this->contactnumber,
            'beds' => $this->beds,


        ]);

        session()->flash('message',$this->ids ? 'Hospital Data Updated Successfully.' : 'Hospital Data Created Successfully.'
        );

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
        $Hospital = Hospital::findOrFail($id);
        $this->ids = $id;
        $this->name = $Hospital->name;
        $this->address = $Hospital->address;
        $this->contactnumber = $Hospital->contactnumber;
        $this->beds = $Hospital->beds;

        $this->openModal();
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Hospital::find($id)->delete();
        session()->flash('message', 'Hospital Data Deleted Successfully.');
    }

    //method to add appointment
    public function addAppointment($id)
    {
        $User = Auth::user();
        $logged_in_user = $User->id;

        $status = Appointment::select('status')->where('user_id', 'LIKE', $logged_in_user)
            ->where(function ($query) {
                $query->where('status', '=', 'Pending');
            })
            ->first();



        if ($status) {
            session()->flash('message-appointment', 'Sorry you can`t apply for appointment now. You still have pending appointment.');
        } else {
            $Hospital = Hospital::findOrFail($id);
            $this->ids = $id;

            $this->beds = $Hospital->beds;
            if ($this->beds != 0) {

                $User = Auth::user();
                $Appointment = new Appointment();
                $Appointment->name = $User->name;
                $Appointment->email = $User->email;
                $Appointment->hospital_name = $Hospital->name;
                $Appointment->user_id = $User->id;

                $Hospital->appointment()->save($Appointment);

                session()->flash('message', 'Appointment Added. Please check the Appointments');
            } else {
                session()->flash('message-appointment', 'Sorry, the hospital has no available bed to accomodate.');
            }
        }
    }
}
