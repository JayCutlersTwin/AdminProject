@extends('layouts.layout')

@section('content')
    <section id="CREATESECTION" class="createSection">
        <h1>Add Employee</h1>
        <div class="createDiv">

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="container">
                <form class="create" action="{{ route('employee.create')}}" method="POST">
                    @csrf

                    <label for="company_id">Company ID</label>
                    <select name="company_id" id="company_id" required>
                        @foreach (\App\Models\Company::all() as $company)
                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                {{ ucwords($company->name) }}
                            </option>
                        @endforeach
                    </select>

                    <label for="firstname">First Name</label>
                    <input id="firstname" type="text" name="firstname" placeholder="First Name" required>

                    <label for="lastname">Last Name</label>
                    <input id="lastname" type="text" name="lastname" placeholder="Last Name" required>

                    <label for="company">Company Name</label>
                    <select name="company" id="company" required>
                        @foreach (\App\Models\Company::all() as $company)
                            <option
                                value="{{ $company->name }}">{{ $company->name }}</option>
                        @endforeach
                    </select>

                    <label for="email">Email</label>
                    <input class="@error('email') is-invalid @else is-valid @enderror" id="email" type="email" name="email" placeholder="Email">

                    <label for="phone">Phone</label>
                    <input id="phone" type="text" name="phone" placeholder="Phone Number">

                    <button class="btn btn-success" type="submit" name="button">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection('content')
