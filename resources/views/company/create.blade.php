@extends('layouts.layout')

@section('content')
    <section id="CREATESECTION" class="createSection">
        <h1>Add Company</h1>
        <div class="createDiv">

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="container">
                <form class="create" action="/index" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Name</label>
                    <input id="name" class="inputText" type="text" name="name" placeholder="name" required>

                    <label for="email">Email</label>
                    <input id="email" class="@error('email') is-invalid @else is-valid @enderror" type="email" name="email" placeholder="email" required>

                    <label for="image">Image</label>
                    <input id="image" class="inputFile" type="file" name="image" accept="image/jpeg, image/png" required>

                    <label for="websiteAddress">Website Domain</label>
                    <input id="websiteAddress" class="inputText" type="text" name="websiteAddress" placeholder="WebsiteDomain" required>

                    <button class="btn btn-success" type="submit" name="button">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection('content')
