<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class EmployeeList extends Component
{
    public $employee = []; 
    public $editId = null;
    public $editPhone = '';

    public function mount()
    {
        $this->employee = Employee::all();
    }

    public function render()
    {
        return view('livewire.employee-list', ['employees' => $this->employee]);
    }

    public function deleteemployee($id){
        $employee=Employee::find($id);
        if($employee){
            $employee->delete();
            session()->flash('success', 'Employee delete successfully.');
            $this->mount();
        }
        $this->render();
    }

    public function editemployee($id){
        $this->editId = $id;
        $employee = Employee::find($id);
        if ($employee) {
            $this->editPhone = $employee->phone;
        }

    }

    public function updateemployee($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            $this->validate([
                'editPhone' => 'required|regex:/^\d{10}$/',
            ], [
                'editPhone.regex' => 'The phone number must be exactly 10 digits.'
            
            ]);
            $employee->phone = $this->editPhone;
            $employee->save();
            
            $this->editId = null;
            $this->mount(); 
            session()->flash('success', 'Employee updated successfully.');

        }
    }

    public function cancelEdit()
    {
        $this->editId = null;
    }
}
