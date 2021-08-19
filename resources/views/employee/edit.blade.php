@extends('layouts.layout')

@section('content')
    <section id="CREATESECTION" class="createSection">
        <div class="createDiv">
            <form class="createEmployee" action="/showEmployee/{{ $employee->id }}" method="POST">
                @csrf
                @method('PATCH')
                <select name="company_id" id="company_id" required>
                    @foreach (\App\Models\Company::all() as $company)
                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                            {{ ucwords($company->name) }}
                        </option>
                    @endforeach
                </select>
                <input type="text" name="firstname" placeholder="firstname" value="{{ $employee->firstname }}" required>
                <input type="text" name="lastname" placeholder="lastname" value="{{ $employee->lastname }}" required>
                <select name="company" id="company" required>
                    @foreach (\App\Models\Company::all() as $company)
                        <option
                            value="{{ $company->name }}">{{ $company->name }}
                        </option>
                    @endforeach
                </select>
                <input type="text" name="email" value="{{ $employee->email }}" placeholder="email" required>
                <input type="text" name="phone" value="{{ $employee->phone }}" placeholder="phone" required>
                <button type="submit" name="button">Update</button>
            </form>
        </div>
    </section>
@endsection('content')
