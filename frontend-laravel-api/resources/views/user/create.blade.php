<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Frontend & Backend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: darkblue; color: white;">
    <div class="container mt-5">
        <h1 class="text-center">Kullanıcı Kayıt Formu</h1>

        <form action="{{ route('user.store') }}" method="post" class="mx-auto" style="max-width: 600px; margin-top:50px;">
            @csrf
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Adınızı Giriniz:</label>
                        <input type="text" class="form-control" name="name" placeholder="İsim" required>
                    </div>

                    <div class="col-md-6">
                        <label for="surname" class="form-label">Soyadınızı Giriniz:</label>
                        <input type="text" class="form-control" name="surname" placeholder="Soyisim" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-posta Adresinizi Giriniz:</label>
                <input type="email" class="form-control" name="email" placeholder="E-posta" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Şifre Belirleyin:</label>
                <input type="password" class="form-control" name="password" placeholder="Şifre" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Şifrenizi Tekrar Giriniz:</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Şifre Tekrar" required>
            </div>

            <button type="submit" class="btn btn-success btn-block float-end">Kaydet</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
