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
        </div>
    </header>