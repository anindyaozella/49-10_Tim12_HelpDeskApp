<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IT Support Helpdesk</title><link rel="stylesheet" href="{{ asset('style.css') }}">
</head><body>
<aside class="sidebar">
    <div class="brand"><div class="brand-logo">IT</div><div><b>HELPDESK</b><small>IT Support System</small></div></div>
    <p class="menu-title">MENU UTAMA</p>
    <nav>
        <a href="{{ route('dashboard') }}">⌂ Dashboard</a>
        <a href="{{ route('teknisi') }}">♙ Data Teknisi</a>
        <a href="{{ route('keahlian') }}">⚙ Master Keahlian</a>
    </nav>
    <div class="admin"><b>{{ auth()->user()->name }}</b><small>Administrator</small>
        <form action="{{ route('logout') }}" method="POST">@csrf<button>Logout</button></form>
    </div>
</aside>
<main>@yield('content')</main>
</body></html>
