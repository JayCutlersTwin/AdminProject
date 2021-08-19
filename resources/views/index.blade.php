@extends('layouts.layout')

@section('content')

<section class="mainSection" id="DASHBOARD">
    <div class="container">
        <h1>Companies</h1>
        <div class="databaseDiv">
            <div class="databaseTable">
                <a href="company/create">Add a Company</a>
                <table>
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Company Email</th>
                            <th>Company Logo</th>
                            <th>Company Domain</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td><a href="/showCompany/{{ $company->id }}">{{ $company->name}}</a></td>
                                <td>{{ $company->email}}</td>
                                <td><img src="{{ $company->image }}" alt="Image"></td>
                                <td>{{ $company->websiteAddress}}</td>
                                <td><a class="editBtn" href="/showCompany/{{ $company->id }}/edit">Edit</a></td>
                                <td>
                                    <form method="POST" action="/showCompany/{{ $company->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="DeleteBtn">Delete</button>
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
