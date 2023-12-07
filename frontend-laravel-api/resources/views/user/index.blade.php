<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Frontend & Backend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <div class="wrapper">
            <h1>Ürün Listesi</h1>
            <a class="btn" style="background-color:darkblue; color:white;" href="/form/create">Ürün Ekle</a>
            <a class="btn" style="margin-left:100px; background-color:darkred; color:white;" href="/logout">Çıkış Yap</a>
            <br>
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

            @if($forms && count($forms) > 0)
                <ul class="input-box">
                    @foreach($forms as $form)
                        <li class="mrg list-group-item">
                            <strong>Ürün İsmi:</strong> {{ $form['name'] }}<br>
                            <strong>Ürün Markası:</strong> {{ $form['surname'] }}<br>
                            <strong>Satıcı İletişim:</strong> {{ $form['email'] }}<br>
                            <form action="{{ route('user.destroy', ['id' => $form['id']]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <a class="btn" href="{{ route('user.edit', ['id' => $form['id']]) }}">Düzenle</a>
                                    <button type="submit" class="b-btn btn" onclick="return confirmDelete()">Sil</button>
                                </div>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="mt-3">Ürün verilerine ulaşılamadı!</p>
            @endif
    </div>
    <script>
        function confirmDelete() {
            return confirm("UYARI! Seçtiğiniz ürün silinecek.");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
