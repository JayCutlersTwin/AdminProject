<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;

use Illuminate\Http\Request;

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

    // public function createEmployee(){
    //     if (session()->has('LoggedUser')) {
    //         return view('employee.create');
    //     } else {
    //         return redirect('login');
    //     }
    // }
    //
    // public function storeEmployee(){
    //
    //     $employee = new Employee();
    //     $employee->company_id = request('company_id');
    //     $employee->firstname = request('firstname');
    //     $employee->lastname = request('lastname');
    //     $employee->company = request('company');
    //     $employee->email = request('email');
    //     $employee->phone = request('phone');
    //
    //     $employee->save();
    //
    //     return redirect('/index');
    // }

    public function createEmployee(){
        if (session()->has('LoggedUser')) {
            return view('employee.create');
        } else {
            return redirect('login');
        }
    }

    public function storeEmployee(){

        Employee::create(array_merge($this->validateEmployee(), [
            'company_id' => request()->company()->id
        ]));

        return redirect('/index');
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
        $attributes = Employee::findOrFail($id);
        $attributes->company_id = request('company_id');
        $attributes->firstname = request('firstname');
        $attributes->lastname = request('lastname');
        $attributes->company = request('company');
        $attributes->email = request('email');
        $attributes->phone = request('phone');
        $attributes->update();

        return redirect('/index')->with('status', 'Employee Updated!');
    }

    public function destroyEmployee($id){
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect('/index');
    }

    protected function validateEmployee(?Employee $employee = null): array
    {
        $employee ??= new Employee();

        return request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'company' => 'required'
        ]);
    }

}
