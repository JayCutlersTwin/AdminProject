<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        if (session()->has('LoggedUser')) {
            return view('index', [
                'companies' => Company::paginate(10)
            ]);
        } else {
            return redirect('login');
        }
    }

    public function showCompany($id){
        if (session()->has('LoggedUser')) {
            $company = Company::findOrFail($id);
            $employees = Employee::where('company_id', '=', $id)->paginate(10);

            return view('company.show', [
                'company' => $company,
                'employees' => $employees
            ]);
        } else {
            return redirect('login');
        }
    }

    public function editCompany($id){
        if (session()->has('LoggedUser')) {
            $company = Company::findOrFail($id);
            return view('company.edit', ['company' => $company]);
        } else {
            return redirect('login');
        }
    }

    public function updateCompany($id)
    {
        $attributes = Company::findOrFail($id);
        $attributes->name = request('name');
        $attributes->email = request('email');
        $attributes->image = request()->file('image')->store('logo');
        $attributes->websiteAddress = request('websiteAddress');
        $attributes->update();

        return redirect('/index')->with('status', 'Company Updated!');
    }

    public function createCompany(){
        if (session()->has('LoggedUser')) {
            return view('company.create');
        } else {
            return redirect('login');
        }
    }

    public function storeCompany(){

        $company = new Company();
        $company->name = request('name');
        $company->email = request('email');
        $company->image = request()->file('image')->store('logo');
        $company->websiteAddress = request('websiteAddress');

        $company->save();

        return redirect('/index');
    }

    public function destroyCompany($id){
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect('/index');
    }
}
