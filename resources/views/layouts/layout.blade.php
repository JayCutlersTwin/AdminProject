<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Project</title>
        <link rel="stylesheet" href="/css/app.css">
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
                            <button type="submit" name="button">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <footer> Copyright 2021</footer>
        <!-- <script src="js/app.js" charset="utf-8"></script> -->
    </body>
</html>
