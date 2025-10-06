<!DOCTYPE html>
<html lang="id">
<head>
    <title>Halaman Login Kreatif</title>
</head>
<body>

    <h1>LOGIN</h1>

    {{-- Menampilkan pesan error dari validasi --}}
    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Menampilkan pesan error lainnya (misal, username/pass salah) --}}
    @if (Session::has('error'))
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            {{ Session::get('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.process') }}">
        @csrf

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <small>Min. 3 karakter & mengandung huruf Kapital</small>
        </div>

        <button type="submit">Login</button>
    </form>

</body>
</html>
