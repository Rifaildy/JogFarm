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
            flex-wrap: wrap;
            max-width: 1300px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
        }
        .main-content, .sidebar {
            padding: 20px;
            box-sizing: border-box;
        }
        .main-content {
            flex: 3;
        }
        .sidebar {
            flex: 1;
            border-left: 1px solid #ddd;
        }
        .highlight, .verified, .price {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }
        .price {
            font-size: 1.5em;
            color: red;
        }
        .image-gallery img {
            width: 60%;
            height: auto;
            margin-top: 10px;
        }
        .description {
            margin-top: 20px;
        }
        .related-ads {
            margin-top: 30px;
        }
        .related-ads img {
            width: 100px;
            height: 100px;
            display: block;
        }
        .related-ads a {
            display: inline-block;
            margin-right: 10px;
            text-decoration: none;
            color: red;
        }
        .related-ads a:last-child {
            margin-right: 0;
        }
        
        /* Tombol Edit - Warna Biru/Primary */
        button.edit {
            background-color: #007bff; /* Warna biru */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button.edit:hover {
            background-color: #0056b3; /* Warna biru lebih gelap saat hover */
        }

        button.edit a {
            color: white;
            text-decoration: none;
        }

        /* Tombol Hapus - Warna Merah/Danger */
        button.hapus {
            background-color: #dc3545; /* Warna merah */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button.hapus:hover {
            background-color: #c82333; /* Warna merah lebih gelap saat hover */
        }

        button.hapus a {
            color: white;
            text-decoration: none;
        }

    </style>
</head>
<body>
    @include('part.header')
    @include('sweetalert::alert')
    
    <main>
        <div class="main-content">
            <div class="product-detail">
                <h1>{{ $product->product_name }}</h1>
                <img src="{{ Storage::url($product->image_path) }}" alt="">
                <p>{{ $product->description }}</p>
                <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
            <button class="edit"><a href="{{ route('produk.edit', $product->id) }}">Edit</a></button>
            <form action="{{ route('produk.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="hapus" type="submit">Hapus</button>
            </form>
            <div class="related-ads">
                <h3>Iklan terkait</h3>
                <a href="#"><img src="{{ asset('images/Sapi.png') }}" alt="Related1"><p>Rp30.000</p></a>
                <a href="#"><img src="{{ asset('images/Angsa.png') }}" alt="Related2"><p>Rp80.000</p></a>
                <a href="#"><img src="{{ asset('images/Pelet.png') }}" alt="Related3"><p>Rp200.000</p></a>
            </div>
        </div>
        <div class="sidebar">
            <button style="width: 100%; padding: 10px; background-color: green; color: white; font-size: 1.2em; border: none; cursor: pointer;">buat penawaran</button>
            <div style="margin-top: 20px;">
                <h3>Penjual</h3>
                <button style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; cursor: pointer;">chat dengan penjual</button>
          
        </div>
    </main>

</body>
</html>