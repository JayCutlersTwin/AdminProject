<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>


    <body>
        <div class="modalLogin">
            <div class="modalContainer">
                <div class="modalInnerContainer">
                    <h1>Login</h1>
                    <form class="loginForm" action="/login" method="POST">
                        @if(Session::get('fail'))
                           <div class="alertDiv">
                              {{ Session::get('fail') }}
                           </div>
                        @endif

                        @csrf

                            <input type="text" name="email" id='email' placeholder="Email">
                            <br>
                            <span>@error('email'){{ $message }} @enderror</span>
                            <br>
                            <input type="password" name="password" id='password' placeholder="Password">
                            <br>
                            <span>@error('password'){{ $message }} @enderror</span>

                        <button type="submit" name="button">Login</button>
                    </form>
                    <h6><a href="#">No account, click here to register now!</a></h6>
                </div>
            </div>
        </div>
    </body>

</html>
