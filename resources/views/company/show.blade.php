@extends('layouts.layout')

@section('content')

<a class="GoBackLink" href="/index">Go Back</a>

<section class="mainSection" id="ShowCompanySECTION">
    <div class="container">
        <div class="showCompanyDisplay">
            <h1>{{ $company->name }}</h1>
        </div>
        <div class="databaseDiv">
            <!-- <h2>Employees</h2> -->

            <div class="databaseTable">
                <table>
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Company</th>
                            <th>Employee Email</th>
                            <th>Employee Phone Number</th>
                            <th colspan="2"><a class="btn btn-success" href="/employee/create">Add</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td><a class="linkMe" href="/showEmployee/{{ $employee->id }}">{{ $employee->firstname }} {{ $employee->lastname }}</a></td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td><a class="btn btn-primary" href="/showEmployee/{{ $employee->id }}/edit">Edit</a></td>
                                <td>
                                    <form method="POST" action="/showEmployee/{{ $employee->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $employees -> links() }}
            </div>
        </div>
    </div>
</section>

@endsection('content')
