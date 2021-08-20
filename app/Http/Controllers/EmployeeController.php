<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller {

    public function showEmployee($id){
        if (session()->has('LoggedUser')) {
            $employee = Employee::findOrFail($id);

            return view('employee.show', [
                'employee' => $employee
            ]);
        } else {
            return redirect('login');
        }
    }

    public function createEmployee(){
        if (session()->has('LoggedUser')) {
            return view('employee.create');
        } else {
            return redirect('login');
        }
    }

    public function storeEmployee(){

        Employee::create($this->validateEmployee());

        return redirect('/index')->with('message', 'Employee added!');
    }

    public function editEmployee($id){
        if (session()->has('LoggedUser')) {
            $employee = Employee::findOrFail($id);
            return view('employee.edit', [
                'employee' => $employee
            ]);
        } else {
            return redirect('login');
        }
    }

    public function updateEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        $attributes = $this->validateEmployee($employee);

        $employee->update($attributes);

        return redirect('/index')->with('message', 'Employee Updated!');
    }

    public function destroyEmployee($id){
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect('/index')->with('message', 'Employee Deleted!');
    }

    protected function validateEmployee(?Employee $employee = null): array
    {
        $employee ??= new Employee();

        return request()->validate([
            'company_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'email' => ['required', 'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', Rule::unique('employees', 'email')->ignore($employee)],
            'phone' => 'required'
        ]);
    }
}

/*
    OLD CREATE AND UPDATE - HERE FOR REFERENCE

    public function storeEmployee(){

        $employee = new Employee();
        $employee->company_id = request('company_id');
        $employee->firstname = request('firstname');
        $employee->lastname = request('lastname');
        $employee->company = request('company');
        $employee->email = request('email');
        $employee->phone = request('phone');

        $employee->save();

        return redirect('/index')->with('message', 'Employee added!');
    }

    public function updateEmployee($id)
    {
        $attributes = Employee::findOrFail($id);
        $attributes->company_id = request('company_id');
        $attributes->firstname = request('firstname');
        $attributes->lastname = request('lastname');
        $attributes->company = request('company');
        $attributes->email = request('email');
        $attributes->phone = request('phone');
        $attributes->update();

        return redirect('/index')->with('message', 'Employee Updated!');
    }
*/
