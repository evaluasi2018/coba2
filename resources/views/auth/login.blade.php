<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SI Evaluasi | Login</title>
        <link rel="icon" type="image/png" href="{{ asset('assets/images/unib.png') }}">

        <link rel="stylesheet" href="{{asset('assets/login/style.css')}}">
    </head>
    <body>
        <div class="loginBox">
            <img src="{{asset('assets/login/unib.png')}}" class="user">
            <h2 style="text-transform: uppercase;">Silahkan Login Disini</h2>
                <form action="{{ route('panda.login') }}" method="POST">
                @csrf
                <p>Username</p>
                <input type="text" name="username" class="{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Masukan Username">
                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                <p>Password</p>
                <input type="password" name="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Masukan Password">
                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                <input type="submit" name="" value="Login">
                <a href="#">Lupa Password</a>
            </form>
        </div>
    </body>
</html>
