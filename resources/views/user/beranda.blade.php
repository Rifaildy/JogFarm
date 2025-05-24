<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JogFarm</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    @include('part.header')
            <div class="subnav">
                <div class="location-bar">
                    <input type="text" placeholder="Lokasi">
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Cari produk...">
                    <button type="submit"><i class="botton-search"><img src="{{ asset('images/search-svgrepo-com.png') }}" alt="search"></i></button>
                </div>
            </div>
    <main>
        <div class="rekomendasi">
            <h1>Rekomendasi</h1>
            @foreach ($products as $product)
                <div class="product">
                    <a href="{{ route('detailProduk', $product->id) }}">
                        <img src="{{ Storage::url($product->image_path) }}" alt="">
                        <h3>{{ $product->product_name }}</h3>
                        <p>{{ Str::limit($product->description, 100) }}</p>
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="terbaru">
            <h1>Terbaru</h1>
            @foreach ($products as $product)
                <div class="product">
                    <a href="{{ route('detailProduk', $product->id) }}">
                        <img src="{{ Storage::url($product->image_path) }}" alt="">
                        <h3>{{ $product->product_name }}</h3>
                        <p>{{ Str::limit($product->description, 100) }}</p>
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </main>
    
    @include('part.footer')
</body>
</html>