<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Bilgi Güncelleme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:gray; color: white;">
    <div class="container mt-5">
        <h1 class="text-center">Kullanıcı Bilgi Güncelleme Formu</h1>
        @if($user)
        <form action="{{ route('user.update', $user['id']) }}" method="post" class="mx-auto" style="max-width: 600px; margin-top:50px;">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Adınızı Giriniz:</label>
                        <input type="text" class="form-control" name="name" value="{{ $user['name'] }}" placeholder="İsim" required>
                    </div>

                    <div class="col-md-6">
                        <label for="surname" class="form-label">Soyadınızı Giriniz:</label>
                        <input type="text" class="form-control" name="surname" value="{{ $user['surname'] }}" placeholder="Soyisim" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-posta Adresinizi Giriniz:</label>
                <input type="email" class="form-control" name="email" value="{{ $user['email'] }}" placeholder="E-posta" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Şifre Belirleyin:</label>
                <input type="password" class="form-control" name="password" placeholder="Şifre" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Şifrenizi Tekrar Giriniz:</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Şifre Tekrar" required>
            </div>

            <button type="submit" class="btn btn-success btn-block float-end">Güncelle</button>
        </form>
            @else
            <h5 style="display:flex; justify-content:center; margin-top:200px; color:darkred;">Kullanıcı bilgilerine ulaşılamadı..</h5>
            @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
