<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Frontend & Backend</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <div class="wrapper">
        <form action="{{ route('user.store') }}" method="post">
        @csrf
            <h1>Yeni Sevkiyat</h1>
            <div class="input-box">
                <input type="text" name="name" placeholder="Ürün İsimi" required>
                <i class="fa-solid fa-box"></i>
            </div>
            <div class="input-box">
                <input type="text" name="surname" placeholder="Marka" required>
                <i class="fa-solid fa-copyright"></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="İletişim" required>
                <i class="fa-solid fa-comment-dots"></i>
            </div>
            <button type="submit" class="btn">Ürün Ekle</button>
        </form>
    </div>
</body>
</html>
