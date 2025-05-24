<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JogFarm')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <a href="{{ route('beranda') }}"><img src="{{ asset('images/logojogfarm.jpg') }}"></a>
                </div>
                <h1>JogFarm</h1>
                <ul class="navbar">
                    <li><a href="{{ route('beranda') }}">BERANDA</a></li>
                    <li><a href="{{ route('produk') }}">PRODUK</a></li>
                    <li><a href="{{ route('chat') }}"><img src="{{ asset('images/chat-round-svgrepo-com.png') }}" alt style="width: 25px; height: auto;"></a></li>
                    <li><a href="{{ route('notif') }}"><img src="{{ asset('images/notification-bell-svgrepo-com.png') }}" alt style="width: 25px; height: auto;"></a></li>
                    <li><a href="{{ route('akun') }}"><img src="{{ asset('images/account-svgrepo-com.png') }}" alt style="width: 25px; height: auto;"></a></li>
                    <li><a href="{{ route('jual') }}"><img src="" alt="">JUAL</a></li>
                </ul>
            </nav>
            <div class="subnav">
                <div class="location-bar">
                    <input type="text" placeholder="Lokasi">
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Cari produk...">
                    <button type="submit"><i class="botton-search"><img src="{{ asset('images/search-svgrepo-com.png') }}" alt="search"></i></button>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    
    <footer>
        <p>Marketplace Peternak Jogjakarta</p>
    </footer>
</body>
</html>
