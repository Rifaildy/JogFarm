<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JogFarm</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <style>
        main {
            display: flex;
            margin: auto;
            overflow: hidden;
        }
        .sidebar {
            width: 18%;
            background: #fff;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar h2 {
            margin-top: 0;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 10px 0;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: space-around;
            width: 75%;
            margin-left: 20px;
        }
        .product {
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            width: 300px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product a{
          text-decoration: none;
          color: black;
        }
        .product img {
            max-width: 300px;
            height: 200px;
        }
        .product h3 {
            margin: 15px 0;
        }
        .product p {
            color: #666;
        }
        .product .price {
            color: #e91e63;
            font-size: 1.2em;
            margin: 10px 0;
        }
  </style>
</head>
<body>
    @include('part.header')
    @include('sweetalert::alert')
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
    <aside class="sidebar">
        <h2>Filter Kategori</h2>
        <ul>
            <li><a href="#">Unggas</a></li>
            <li><a href="#">Mamalia</a></li>
            <li><a href="#">Kandang</a></li>
            <li><a href="#">Pakan</a></li>
        </ul>
        <br>
        <h2>Filter Harga</h2>
        <ul>
            <li><a href="#"><= Rp 100.000</a></li>
            <li><a href="#">Rp 100.000 - Rp 500.000</a></li>
            <li><a href="#">Rp 500.000 - Rp 1.00.000</a></li>
            <li><a href="#">Rp 1.000.000 - Rp 5.000.000</a></li>
            <li><a href="#">>= Rp 5.000.000</a></li>
        </ul>
        <br>
        <h2>Filter Lainnya</h2>
        <ul>
            <li><a href="#">Terdekat</a></li>
            <li><a href="#">Favorit</a></li>
        </ul>
    </aside>
    <div class="product-grid">
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
