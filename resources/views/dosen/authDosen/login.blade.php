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
            <h2 style="text-transform: uppercase;">Silahkan Login Disini (Dosen)</h2>
                <form action="{{ route('dosen.login.submit') }}" method="POST" class="form-horizontal">
                @csrf
                <p>Nomor Induk Pegawai</p>
                <input type="text" name="nip" class="{{ $errors->has('nip') ? ' is-invalid' : '' }}" placeholder="Masukan nip">
                @if ($errors->has('nip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nip') }}</strong>
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
