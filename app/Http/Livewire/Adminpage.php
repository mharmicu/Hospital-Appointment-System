<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Hospital;
use Illuminate\Support\Facades\Auth;

class Adminpage extends Component
{
    public $name, $address, $contactnumber, $beds, $usertype, $hospital_id, $ids;
    public $isOpen = 0;
    use WithPagination;
    public $search = '',  $searchTerm;

    public function render()
    {
        $User = Auth::user();
        $assigned_hospital = $User->hospital_id;
        $this->usertype = $User->usertype;

        $hospitals = Hospital::where('id', 'LIKE', $assigned_hospital)
            ->where(function ($query) {
                $searchTerm = '%' . $this->searchTerm . '%';
                $query->where('name', 'LIKE', $searchTerm)
                    ->orWhere('address', 'LIKE', $searchTerm)
                    ->orWhere('contactnumber', 'LIKE', $searchTerm)
                    ->orWhere('beds', 'LIKE', $searchTerm);
            })
            ->orderBy('id', 'ASC')->paginate(10);


        if ($this->usertype === 'ADM') {
            return view('livewire.adminpage', ['hospitals' => $hospitals]);
        } else {
            return view('livewire.adminpage-staff', ['hospitals' => $hospitals]);
        }
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

    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'contactnumber' => 'required',
        'beds' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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

        session()->flash(
            'message',
            $this->ids ? 'Hospital Data Updated Successfully.' : 'Hospital Data Created Successfully.'
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
}
