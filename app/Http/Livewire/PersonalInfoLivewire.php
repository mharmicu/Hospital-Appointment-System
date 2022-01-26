<?php

namespace App\Http\Livewire;

use App\Models\PersonalInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PersonalInfoLivewire extends Component
{
    public $user_id, $name, $email, $sex, $age, $address, $contactnum, $ids;
    public $isOpen = 0;
    use WithPagination;
    public $search = '', $searchTerm;


    public function render()
    {
        $User = Auth::user();
        $logged_in_user = $User->id;

        if ($User->usertype === 'USR') {
            $personal_infos = PersonalInfo::where('user_id', 'LIKE', $logged_in_user)
                ->where(function ($query) {
                    $searchTerm = '%' . $this->searchTerm . '%';
                    $query->where('name', 'LIKE', $searchTerm)
                        ->orWhere('email', 'LIKE', $searchTerm)
                        ->orWhere('sex', 'LIKE', $searchTerm)
                        ->orWhere('age', 'LIKE', $searchTerm)
                        ->orWhere('address', 'LIKE', $searchTerm)
                        ->orWhere('contactnum', 'LIKE', $searchTerm)
                        ->orWhere('user_id', 'LIKE', $searchTerm);
                })

                ->orderBy('id', 'ASC')->paginate(10);
        } elseif ($User->usertype === 'ADM') {
            $searchTerm = '%' . $this->searchTerm . '%';
            $personal_infos = PersonalInfo::where('user_id', 'LIKE', $searchTerm)
                ->orWhere('name', 'LIKE', $searchTerm)
                ->orWhere('email', 'LIKE', $searchTerm)
                ->orWhere('sex', 'LIKE', $searchTerm)
                ->orWhere('age', 'LIKE', $searchTerm)
                ->orWhere('address', 'LIKE', $searchTerm)
                ->orWhere('contactnum', 'LIKE', $searchTerm)
                ->orWhere('user_id', 'LIKE', $searchTerm)
                ->orderBy('id', 'ASC')->paginate(10);
        } elseif ($User->usertype === 'AHS') {
            $personal_infos = PersonalInfo::where('user_id', 'LIKE', $logged_in_user)
                ->where(function ($query) {
                    $searchTerm = '%' . $this->searchTerm . '%';
                    $query->where('name', 'LIKE', $searchTerm)
                        ->orWhere('email', 'LIKE', $searchTerm)
                        ->orWhere('sex', 'LIKE', $searchTerm)
                        ->orWhere('age', 'LIKE', $searchTerm)
                        ->orWhere('address', 'LIKE', $searchTerm)
                        ->orWhere('contactnum', 'LIKE', $searchTerm)
                        ->orWhere('user_id', 'LIKE', $searchTerm);
                })

                ->orderBy('id', 'ASC')->paginate(10);
        }


        return view('livewire.personal-info-livewire', ['personal_infos' => $personal_infos]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function personalinfocreate()
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
        $this->email = '';
        $this->sex = '';
        $this->age = '';
        $this->address = '';
        $this->contactnum = '';
        $this->ids = '';
    }

    protected $rules = [
        'sex' => 'required',
        'age' => 'required',
        'address' => 'required',
        'contactnum' => 'required',
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
        $User = Auth::user();
        $logged_in_user = $User->id;

        $user_id = PersonalInfo::select('user_id')->where('user_id', 'LIKE', $logged_in_user)
            ->where(function ($query) {
                $User = Auth::user();
                $logged_in_user = $User->id;
                $query->where('user_id', '=', $logged_in_user);
            })
            ->first();

        if ($user_id) {
            session()->flash('message-info', 'Sorry you can`t create new personal information');
            $this->closeModal();
            $this->resetInputFields();
        } else {

            $this->validate([
                'sex' => 'required',
                'age' => 'required',
                'address' => 'required',
                'contactnum' => 'required',
            ]);

            PersonalInfo::updateOrCreate(['id' => $this->ids], [
                'user_id' => $User->id,
                'name' => $User->name,
                'email' => $User->email,
                'sex' => $this->sex,
                'age' => $this->age,
                'address' => $this->address,
                'contactnum' => $this->contactnum,

            ]);


            session()->flash(
                'message',
                $this->ids ? 'Personal Info Updated Successfully.' : 'Personal Info Created Successfully.'
            );

            $this->closeModal();
            $this->resetInputFields();
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $PersonalInfo = PersonalInfo::findOrFail($id);
        $this->ids = $id;
        $this->name = $PersonalInfo->name;
        $this->email = $PersonalInfo->email;
        $this->sex = $PersonalInfo->sex;
        $this->age = $PersonalInfo->age;
        $this->address = $PersonalInfo->address;
        $this->contactnum = $PersonalInfo->contactnum;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        PersonalInfo::find($id)->delete();
        session()->flash('message', 'Personal Info Deleted Successfully.');
    }
}
