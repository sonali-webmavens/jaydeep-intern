<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class EmployeeRegister extends Component
{
    public $name;
    public $email;
    public $phone;
    public function render()
    {
        return view('livewire.employee-register');
    }

    public function submit(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            // 'phone' => 'required|min:10',
            
        ]);

        $student=new Employee ();
        $student->name=$this->name;
        $student->email=$this->email;
        $student->phone=$this->phone;
        $student->save();
        session()->flash('success', 'employee registration successfully');
        
        $this->resetfilter();

    }

    public function resetfilter(){
        $this->reset(['name','email','phone',]);
    }
}
