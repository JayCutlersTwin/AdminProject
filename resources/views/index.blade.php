@extends('layouts.layout')

@section('content')

<section class="mainSection" id="DASHBOARD">
    <div class="container">
        <h1>Companies</h1>
        <div class="databaseDiv">
            <div class="databaseTable">
                <table>
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Company Email</th>
                            <th>Company Logo</th>
                            <th>Company Domain</th>
                            <th colspan="2"><a class="btn btn-success" href="company/create">Add</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td><a class="linkMe" href="/showCompany/{{ $company->id }}">{{ $company->name}}</a></td>
                                <td>{{ $company->email}}</td>
                                <td><img style="width:100px; height:100px;" src="{{ asset('storage/' . $company->image) }}"></td>
                                <td>{{ $company->websiteAddress}}</td>
                                <td><a class="btn btn-primary" href="/showCompany/{{ $company->id }}/edit">Edit</a></td>
                                <td>
                                    <form method="POST" action="/showCompany/{{ $company->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $companies-> links() }}
            </div>
        </div>
    </div>
</section>

@endsection('content')
