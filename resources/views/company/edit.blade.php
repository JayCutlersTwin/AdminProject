@extends('layouts.layout')

@section('content')
<section id="CREATESECTION" class="createSection">
    <h1>Edit Company: {{ $company->name }}</h1>
    <div class="createDiv">
        <div class="container">
            <form class="create" action="/showCompany/{{ $company->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="name">Name</label>
                <input id="name" class="inputText" type="text" name="name" value="{{ $company->name }}" required>

                <label for="email">Email</label>
                <input id="email" class="@error('email') is-invalid @else is-valid @enderror" type="email" name="email" value="{{ $company->email }}" required>

                <label for="image">Image</label>
                <input id="image" class="inputFile" type="file" name="image" :value="old('image', $company->image)" accept="image/jpeg, image/png">
                <img style="width:100px; height:100px;" src="{{ asset('storage/' . $company->image) }}">

                <label for="websiteAddress">Website Domain</label>
                <input id="websiteAddress" class="inputText" type="text" name="websiteAddress" value="{{ $company->websiteAddress }}" required>

                <button class="btn btn-success" type="submit" name="button">update</button>
            </form>
        </div>
    </div>
</section>
@endsection('content')
