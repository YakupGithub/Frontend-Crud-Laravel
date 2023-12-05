<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Güncelleme</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
    <div class="wrapper">
        <form action="{{ route('user.update', $user['id']) }}" method="post" class="mx-auto" style="max-width: 600px; margin-top:50px;">
            @method('PUT')
            @csrf
            <h1>Ürün Güncelleme</h1>
            <div class="input-box">
                <input type="text" name="name" value="{{ $user['name'] }}" placeholder="İsim" required>
                <i class="fa-solid fa-box"></i>
            </div>
            <div class="input-box">
                <input type="text" name="surname" value="{{ $user['surname'] }}" placeholder="Soyisim" required>
                <i class="fa-solid fa-copyright"></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" value="{{ $user['email'] }}" placeholder="E-posta" required>
                <i class="fa-solid fa-comment-dots"></i>
            </div>
            <button type="submit" class="btn">Güncelle</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
