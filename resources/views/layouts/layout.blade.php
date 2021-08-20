<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Project</title>
        <link rel="stylesheet" href="/css/app.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    </head>

    <body>

        <div class="navBarMain">
            <div class="navBarMainDiv">

                <!-- Menu -->
                <div class="menu">
                    <nav>
                        <a href="/">Home</a>
                        <a href="/index">Dashboard</a>
                    </nav>

                    <div class="registrationButtons">
                        <form class="logout" action="/logout" method="post">
                            @csrf
                            <button type="submit" name="button" class="btn btn-secondary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="liveAlert" style="margin:auto; margin-top:1rem; width:50%;">
              {{ session()->get('message') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#liveAlert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
        <footer> Admin Project Copyright 2021</footer>
        <!-- <script src="js/app.js" charset="utf-8"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>
