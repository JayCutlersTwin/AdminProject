@extends('layouts.layout')

@section('content')
    <section id="CREATESECTION" class="createSection">
        <div class="createDiv">
            <form class="createCompany" action="/index" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="name" required>
                <input type="text" name="email" placeholder="email">
                <input type="file" name="image" placeholder="image">
                <input type="text" name="websiteAddress" placeholder="WebsiteDomain">
                <button type="submit" name="button">Create</button>
            </form>
        </div>
    </section>
@endsection('content')
