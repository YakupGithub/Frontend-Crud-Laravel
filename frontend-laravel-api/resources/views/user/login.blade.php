<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="wrapper">
<h1>Hoşgeldiniz</h1>
    <form method="POST" action="{{ route('user.login') }}">
    <br>
    @csrf
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="input-box">
            <input type="email" placeholder="Email" id="email" class="form-control" name="email" required
                autofocus>
                <i class="fa-solid fa-envelope"></i>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
            <i class="fa-solid fa-lock"></i>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="register-link">
                <p>Hesabınız yok mu? <a href="http://localhost:8000/register">Kayıt Ol</a></p>
            </div>
        <div class="d-grid mx-auto">
            <button type="submit" class="btn btn-dark btn-block">Giriş Yap</button>
        </div>
    </form>
</div>
</body>
</html>
