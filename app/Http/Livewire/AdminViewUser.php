<?php

namespace App\Http\Livewire;

use App\Models\Hospital;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Http\Request;

class AdminViewUser extends Component
{
    public $usertype, $ids, $name, $email, $hospital_id, $hospital_name;
    public $isOpen = 0;
    public $isBukas = 0;
    public $isAssignHospitalModalOpen = 0;
    use WithPagination;
    public $search='',  $searchTerm;
    
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        $users = User::where('id','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('email','LIKE',$searchTerm)
                    ->orWhere('usertype','LIKE',$searchTerm)
                    ->orWhere('hospital_name','LIKE',$searchTerm)
                    ->orWhere('hospital_id','LIKE',$searchTerm)
                    ->orderBy('id','ASC')->paginate(10);

        return view('livewire.admin-view-user',['users'=>$users]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function changeusertype()
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

    public function openAssignHospitalModal()
    {
        $this->isAssignHospitalModalOpen = true;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeAssignHospitalModal()
    {
        $this->isAssignHospitalModalOpen = false;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->usertype = '';
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'usertype' => 'required',
            
        ]);
    
        User::updateOrCreate(['id' => $this->ids], [
            'usertype' => $this->usertype,
        ]);

        session()->flash('message', 
            $this->ids ? 'User Type Updated' : 'User Data Created Successfully.');
          
        $this->closeModal();
        $this->resetInputFields();       
    }

    public function storeAssignHospital()
    {      
        $this->validate([
            'hospital_id' => 'required',
            
        ]);

        
    
        User::updateOrCreate(['id' => $this->ids], [
            'hospital_id' => $this->hospital_id,

            $Hospital = Hospital::find($this->hospital_id),
            $this->hospital_name = $Hospital->name,
            'hospital_name' => $this->hospital_name,

        ]);

        

        session()->flash('message', 
            $this->ids ? 'Assigned Hospital ID Updated' : 'User Data Created Successfully.');
              
        $this->closeAssignHospitalModal();    
        $this->resetInputFields();              
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        $this->ids = $id;
        $this->usertype = $users->usertype;
     
        $this->openModal();
    }

    public function assignHospital($id)
    {
        $users = User::findOrFail($id);
        $this->ids = $id;
        $this->hospital_id = $users->hospital_id;
        $this->openAssignHospitalModal();
    }

    public function view($id)
    {
        $users = User::findOrFail($id);
        
        $this->ids = $id;
        $this->name = $users->name;
        $this->email = $users->email;
        $this->usertype = $users->usertype;  
        $this->hospital_name = $users->hospital_name; 
        $this->hospital_id = $users->hospital_id; 
        
        $this->bukasModal();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }

    
}
