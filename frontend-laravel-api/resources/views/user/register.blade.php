<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/create copy.css') }}">
</head>
<body>
    <div class="wrapper">
        <form action="{{ route('user.register') }}" method="POST">
            @csrf
            <h1>Kayıt Formu</h1>
            <br>
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
                <input type="text" name="name" placeholder="İsim Soyisim" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="E-posta" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Şifre" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password_confirmation" placeholder="Şifre Tekrar" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="register-link">
                <p>Hesabınız var mı? <a href="http://localhost:8000/login">Giriş Yap</a></p>
            </div>
            <button type="submit" class="btn">Kayıt Ol</button>
        </form>
    </div>
</body>
</html>
