@extends('layouts.layout')

@section('content')

<a href="#">Go Back</a>

<section class="mainSection">
    <div class="container">
        <div class="showCompanyDisplay">
            <h1>{{ $employee->firstname }} {{ $employee->lastname }}</h1>
        </div>
        <div class="databaseDiv">
            <h4>Contact Info</h4>
            <h6>{{ $employee->email }}</h6>
            <h6>{{ $employee->phone }}</h6>
        </div>
        <div class="deleteEmployee">
            <form method="POST" action="/showEmployee/{{ $employee->id }}">
                @csrf
                @method('DELETE')

                <button class="DeleteBtn">Delete</button>
            </form>
        </div>
    </div>
</section>

@endsection('content')
