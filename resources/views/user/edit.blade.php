<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JogFarm</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        main {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .hidden {
            display: none;
        }
        footer{
            position: fixed;
            bottom: 0;
        }
    </style>
</head>
<body>
    @include('part.header')
    @include('sweetalert::alert')
    <main>
        <div class="container">
            <h2>Edit Produk</h2>
            <form action="{{ route('produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="productName">Nama Produk</label>
                    <input type="text" id="productName" name="productName" value="{{ $product->product_name }}" required>
                </div>
                <div class="form-group">
                    <label for="productDescription">Deskripsi Produk</label>
                    <textarea id="productDescription" name="productDescription" rows="4" required>{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="productPrice">Harga Produk (Rp)</label>
                    <input type="number" id="productPrice" name="productPrice" value="{{ $product->price }}" required>
                </div>
                <div class="form-group">
                    <label for="productImage">Gambar Produk</label>
                    <input type="file" id="productImage" name="productImage" accept="image/*">
                    <img src="{{ Storage::url($product->image_path) }}" alt="Current Image" style="width: 100px;">
                </div>
                <div class="form-group">
                    <button type="submit">Update Produk</button>
                </div>
            </form>
        </div>
    </main>

    @include('part.footer')
    
</body>
</html>