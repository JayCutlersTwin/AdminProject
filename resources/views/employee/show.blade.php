@extends('layouts.layout')

@section('content')

<a class="GoBackLink" href="/showCompany/{{ $employee->company_id }}">Go Back</a>

<section class="SingleEmployeeSection">
    <div class="container">
        <div class="EmployeeName">
            <h1>Contact Info</h1>
        </div>
        <div class="EmployeeContactDiv">
            <div class="container">
                <h4>{{ $employee->firstname }} {{ $employee->lastname }}</h4>
                <h6>Email Address: {{ $employee->email }}</h6>
                <h6>Phone Number: {{ $employee->phone }}</h6>
                <h6>Description:</h6>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

                <div class="deleteEmployee">
                    <form method="POST" action="/showEmployee/{{ $employee->id }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" style="margin:30px 0px;">Delete</button>
                    </form>
                </div>
                
            </div>
        </div>

    </div>
</section>

@endsection('content')
