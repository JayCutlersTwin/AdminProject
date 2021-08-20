<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;

use Illuminate\Validation\Rule;
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

    public function createCompany(){
        if (session()->has('LoggedUser')) {
            return view('company.create');
        } else {
            return redirect('login');
        }
    }

    public function storeCompany(){

        Company::create(array_merge($this->validateCompany(), [
            'image' => request()->file('image')->store('image', 'public')
        ]));

        return redirect('/index')->with('message', 'Company Created!');
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
        $company = Company::findOrFail($id);
        $attributes = $this->validateCompany($company);

        if ($attributes['image'] ?? false) {
            $attributes['image'] = request()->file('image')->store('image', 'public');
        }

        $company->update($attributes);

        return redirect('/index')->with('message', 'Company Updated!');
    }

    public function destroyCompany($id){
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect('/index')->with('message', 'Company Deleted!');
    }

    protected function validateCompany(?Company $company = null): array
    {
        $company ??= new Company();

        return request()->validate([
            'name' => 'required',
            'email' => ['required', 'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', Rule::unique('companies', 'email')->ignore($company)],
            'image' => $company->exists ? ['image'] : ['required', 'image'],
            'websiteAddress' => 'required'
        ]);
    }
}



/*
    OLD CREATE AND UPDATE - HERE FOR REFERENCE

    public function updateCompany($id)
    {
        $attributes = Company::findOrFail($id);
        $attributes->name = request('name');
        $attributes->email = request('email');
        $attributes->image = request()->file('image')->store('images', 'public');
        $attributes->websiteAddress = request('websiteAddress');
        $attributes->update();

        return redirect('/index')->with('message', 'Company Updated!');
    }


    public function storeCompany(){

        $company = new Company();
        $company->name = request('name');
        $company->email = request('email');
        $company->image = request()->file('image')->store('images', 'public');
        $company->websiteAddress = request('websiteAddress');

        $company->save();

        return redirect('/index')->with('message', 'Company Added!');
    }
*/
