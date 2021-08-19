@extends('layouts.layout')

@section('content')

<a href="/index">Go Back</a>

<section class="mainSection">
    <div class="container">
        <div class="showCompanyDisplay">
            <h1>{{ $company->name }}</h1>
        </div>
        <div class="databaseDiv">
            <h1>Employees</h1>
            <a href="/employee/create">add employee to company</a>
            <div class="databaseTable">
                <table>
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Company</th>
                            <th>Employee Email</th>
                            <th>Employee Phone Number</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td><a href="/showEmployee/{{ $employee->id }}">{{ $employee->firstname }} {{ $employee->lastname }}</a></td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td><a class="editBtn" href="/showEmployee/{{ $employee->id }}/edit">Edit</a></td>
                                <td>
                                    <form method="POST" action="/showEmployee/{{ $employee->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="DeleteBtn">Delete</button>
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
