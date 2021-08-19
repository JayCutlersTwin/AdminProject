@extends('layouts.layout')

@section('content')
<section id="CREATESECTION" class="createSection">
    <h1>Edit Company: {{ $company->name }}</h1>
    <div class="createDiv">
        <form class="createCompany" action="/showCompany/{{ $company->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" name="name" value="{{ $company->name }}" required>
            <input type="text" name="email" value="{{ $company->email }}" required>
            <input type="file" name="image" value="{{ $company->image }}" required>
            <input type="text" name="websiteAddress" value="{{ $company->websiteAddress }}" required>

            <button type="submit" name="button">update</button>
        </form>
    </div>
</section>
@endsection('content')
