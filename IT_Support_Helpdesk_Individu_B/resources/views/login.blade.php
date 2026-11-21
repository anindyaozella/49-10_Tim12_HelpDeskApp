<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Helpdesk</title><link rel="stylesheet" href="{{ asset('style.css') }}"></head>
<body class="login"><div class="login-box">
    <div class="logo">IT</div><h2>IT Support Helpdesk</h2><p>Modul Teknisi / Support Staff</p>
    @if(session('error'))<p class="error">{{ session('error') }}</p>@endif
    @if($errors->any())<p class="error">Periksa kembali email dan password.</p>@endif
    <form action="{{ route('login.process') }}" method="POST">@csrf
        <label>Email</label><input type="email" name="email" placeholder="Masukkan email" required>
        <label>Password</label><input type="password" name="password" placeholder="Masukkan password" required>
        <button class="full">Login</button>
    </form>
    <p class="demo">Demo: admin@helpdesk.test / password</p>
</div></body></html>
