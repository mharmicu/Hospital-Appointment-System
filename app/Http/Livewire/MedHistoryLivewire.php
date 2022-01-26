<?php

namespace App\Http\Livewire;

use App\Models\MedHistory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MedHistoryLivewire extends Component
{
    public $user_id, $name, $med_history, $surg_history, $medications, $allergies, $date, $ids;
    public $isOpen = 0;
    use WithPagination;
    public $search='', $searchTerm;

    public function render()
    {
        $User = Auth::user();
        $logged_in_user = $User->id;

        
         $med_histories = MedHistory::where('user_id','LIKE',$logged_in_user)
            ->where(function ($query) {
                $searchTerm = '%'.$this->searchTerm . '%';
                $query->where('name','LIKE',$searchTerm)
                    ->orWhere('med_history','LIKE',$searchTerm)
                    ->orWhere('surg_history','LIKE',$searchTerm)
                    ->orWhere('medications','LIKE',$searchTerm)
                    ->orWhere('allergies','LIKE',$searchTerm)
                    ->orWhere('date','LIKE',$searchTerm)
                    ->orWhere('user_id','LIKE',$searchTerm);
            })
            
            ->orderBy('id','ASC')->paginate(10);     

        return view('livewire.med-history-livewire',['med_histories'=>$med_histories]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function medhistorycreate()
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
        $this->med_history = '';
        $this->surg_history = '';
        $this->medications='';
        $this->allergies = '';
        $this->date = '';
        $this->ids = '';
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $User = Auth::user();
        
        $this->validate([
            'med_history' => 'required',
            'surg_history' => 'required',
            'medications' => 'required',
            'allergies' => 'required',
            'date' => 'required|date_format:Y-m-d',
            
        ]);
    
        MedHistory::updateOrCreate(['id' => $this->ids], [
            'user_id' => $User->id,
            'name' => $User->name,
            'med_history' => $this->med_history,
            'surg_history' => $this->surg_history,
            'medications' => $this->medications,
            'allergies' => $this->allergies,
            'date' => $this->date,

        ]);
   
        session()->flash('message', 
            $this->ids ? 'Medical History Updated Successfully.' : 'Medical History Created Successfully.');
   
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
        $MedHistory = MedHistory::findOrFail($id);

        $this->ids = $id;
        $this->name = $MedHistory->name;
        $this->med_history = $MedHistory->med_history;
        $this->surg_history = $MedHistory->surg_history;
        $this->medications = $MedHistory->medications;
        $this->allergies = $MedHistory->allergies;
        $this->date = $MedHistory->date;
     
        $this->openModal();
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        MedHistory::find($id)->delete();
        session()->flash('message', 'Appointment Deleted Successfully.');
    }
}
