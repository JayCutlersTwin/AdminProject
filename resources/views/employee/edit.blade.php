@extends('layouts.layout')

@section('content')
    <section id="CREATESECTION" class="createSection">
        <h1>Edit Employee: {{ $employee->firstname }} {{ $employee->lastname }}</h1>
        <div class="createDiv">

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="container">
                <form class="create" action="/showEmployee/{{ $employee->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <label for="company_id">Company ID</label>
                    <select class="inputSelect" name="company_id" id="company_id" required>
                        @foreach (\App\Models\Company::all() as $company)
                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                {{ ucwords($company->name) }}
                            </option>
                        @endforeach
                    </select>

                    <label for="firstname">First Name</label>
                    <input id="firstname" class="inputText" type="text" name="firstname" placeholder="First Name" value="{{ $employee->firstname }}" required>

                    <label for="lastname">Last Name</label>
                    <input id="lastname" class="inputText" type="text" name="lastname" placeholder="Last Name" value="{{ $employee->lastname }}" required>

                    <label for="company">Company</label>
                    <select class="inputSelect" name="company" id="company" required>
                        @foreach (\App\Models\Company::all() as $company)
                            <option
                                value="{{ $company->name }}">{{ $company->name }}
                            </option>
                        @endforeach
                    </select>

                    <label for="email">Email</label>
                    <input class="@error('email') is-invalid @else is-valid @enderror" id="email" class="inputText" type="email" name="email" value="{{ $employee->email }}" placeholder="Email" required>

                    <label for="phone">Phone Number</label>
                    <input id="phone" class="inputText" type="text" name="phone" value="{{ $employee->phone }}" placeholder="Phone Number" required>
                    <button class="btn btn-success" type="submit" name="button">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection('content')
