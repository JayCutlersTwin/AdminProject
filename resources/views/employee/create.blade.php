@extends('layouts.layout')

@section('content')
    <section id="CREATESECTION" class="createSection">
        <div class="createDiv">
            <form class="createEmployee" action="{{ route('employee.create')}}" method="POST">
                @csrf
                <select name="company_id" id="company_id" required>
                    @foreach (\App\Models\Company::all() as $company)
                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                            {{ ucwords($company->name) }}
                        </option>
                    @endforeach
                </select>
                <input type="text" name="firstname" placeholder="firstname" required>
                <input type="text" name="lastname" placeholder="lastname" required>
                <select name="company" id="company" required>
                    @foreach (\App\Models\Company::all() as $company)
                        <option
                            value="{{ $company->name }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                <input type="text" name="email" placeholder="email">
                <input type="text" name="phone" placeholder="phone">
                <button type="submit" name="button">Create</button>
            </form>
        </div>
    </section>
@endsection('content')
