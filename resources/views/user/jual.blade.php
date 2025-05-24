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

    <main>
        <h2>Unggah Produk</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @include('sweetalert::alert')
        <form id="uploadForm" action="{{ route('product.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category">Pilih Kategori</label>
                <select id="category" name="category">
                    <option value="">Pilih Kategori</option>
                    <option value="Unggas">Unggas</option>
                    <option value="Mamalia">Mamalia</option>
                    <option value="Kandang">Kandang</option>
                    <option value="Pakan">Pakan</option>
                </select>
            </div>
            <div id="productSelect" class="form-group hidden">
                <label for="product">Pilih Produk</label>
                <select id="product" name="product">
                    <option value="">Pilih Produk</option>
                </select>
            </div>
            <div id="productDetails" class="hidden">
                <div class="form-group">
                    <label for="productName">Nama Produk</label>
                    <input type="text" id="productName" name="productName" required>
                </div>
                <div class="form-group">
                    <label for="productDescription">Deskripsi Produk</label>
                    <textarea id="productDescription" name="productDescription" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="productPrice">Harga Produk (Rp)</label>
                    <input type="number" id="productPrice" name="productPrice" required>
                </div>
                <div class="form-group">
                    <label for="productImage">Gambar Produk</label>
                    <input type="file" id="productImage" name="productImage" accept="image/*" required>
                </div>
                <div class="form-group">
                    <button type="submit">Unggah Produk</button>
                </div>
            </div>
        </form>
    </main>

        
    @include('part.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.getElementById('category');
            const productSelectContainer = document.getElementById('productSelect');
            const productSelect = document.getElementById('product');
            const productDetails = document.getElementById('productDetails');

            const products = {
                Unggas: [
                    { id: 'ayam', name: 'Ayam' },
                    { id: 'bebek', name: 'Bebek' }
                ],
                Mamalia: [
                    { id: 'sapi', name: 'Sapi' },
                    { id: 'kambing', name: 'Kambing' },
                    { id: 'kerbau', name: 'Kerbau' }
                ],
                Pakan: [
                    { id: 'pakan-unggas', name: 'Pakan Unggas' },
                    { id: 'pakan-mamalia', name: 'Pakan Mamalia' }
                ],
                Kandang: [
                    { id: 'kandang-ayam', name: 'Kandang Ayam' },
                    { id: 'kandang-burung', name: 'Kandang Burung' }
                ]
            };

            categorySelect.addEventListener('change', function() {
                const category = categorySelect.value;
                if (category !== "") {
                    populateProducts(category);
                    productSelectContainer.classList.remove('hidden');
                } else {
                    productSelectContainer.classList.add('hidden');
                    productDetails.classList.add('hidden');
                }
            });

            productSelect.addEventListener('change', function() {
                if (productSelect.value !== "") {
                    productDetails.classList.remove('hidden');
                } else {
                    productDetails.classList.add('hidden');
                }
            });

            function populateProducts(category) {
                productSelect.innerHTML = '<option value="">Pilih Produk</option>';
                products[category].forEach(function(product) {
                    const option = document.createElement('option');
                    option.value = product.id;
                    option.textContent = product.name;
                    productSelect.appendChild(option);
                });
            }
        });
    </script>
</body>
</html>
