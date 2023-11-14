<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Frontend & Backend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="margin-left:400px; margin-right:400px;">
    <div class="container mt-5">
        <h1>Kullanıcı Listesi</h1>
        <a class="btn btn-primary" href="/form/create" style="margin-bottom:20px; margin-top:20px;">Kullanıcı Ekle</a>
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
        @if($forms && count($forms) > 0)
            <ul class="list-group">
                @foreach($forms as $form)
                    <li class="list-group-item">
                        <strong>İsim:</strong> {{ $form['name'] }}<br>
                        <strong>Soyisim:</strong> {{ $form['surname'] }}<br>
                        <strong>E-posta:</strong> {{ $form['email'] }}<br>
                        <form action="{{ route('user.destroy', ['id' => $form['id']]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="float: right;">Sil</button>
                        </form>
                        <a class="btn btn-warning btn-sm" href="{{ route('user.edit', ['id' => $form['id']]) }}" style="float: right; margin-right:10px;">Düzenle</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="mt-3">Kullanıcı verilerine ulaşılamadı!</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
