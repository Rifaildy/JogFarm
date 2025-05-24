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
            padding: 20px;
        }

        .sidebar {
            width: 300px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            flex: 1;
            margin-left: 20px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-card {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            max-width: 250px;
            height: 150px;
            border-radius: 8px;
        }

        .product-card .product-info {
            margin-top: 10px;
        }

        .product-card .product-info h4 {
            margin: 10px 0;
            font-size: 18px;
        }

        .product-card .product-info .price {
            color: #0056b3;
            font-weight: bold;
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
        <div class="sidebar">
            <h2>RF Aksesoris</h2>
            <p><i class="fas fa-user"></i> Anggota sejak Jan 2020</p>
            <p><i class="fas fa-users"></i> 50 Followers / Following</p>
            <br>
            <button>Edit profil</button>
        </div>
    
        <div class="main-content">
            <div class="product-grid">
                <div class="product-card">
                    <img src="images\Angsa.png" alt="">
                    <div class="product-info">
                        <h4>Bebek Petelur</h4>
                        <p class="price">Rp 80.000</p>
                        <p>01 JAN</p>
                    </div>
                </div>
                <div class="product-card">
                    <img src="images\Ayam1.png" alt="">
                    <div class="product-info">
                        <h4>Ayam Petelur</h4>
                        <p class="price">Rp 70.000</p>
                        <p>21 MAR</p>
                    </div>
                </div>
                <div class="product-card">
                    <img src="images\Sapi.png" alt="">
                    <div class="product-info">
                        <h4>Domba</h4>
                        <p class="price">Rp 4.000.000</p>
                        <p>21 MEI</p>
                    </div>
                </div>
                <div class="product-card">
                    <img src="images\Sapi2.png"alt="">
                    <div class="product-info">
                        <h4>Sapi</h4>
                        <p class="price">Rp 30.000.000</p>
                        <p>1 MAR</p>
                    </div>
                </div>
                <div class="product-card">
                    <img src="images\Sapi3.png" alt="">
                    <div class="product-info">
                        <h4>Sapi Perah</h4>
                        <p class="price">Rp 30.000.000</p>
                        <p>12 NOV</p>
                    </div>
                </div>
                <div class="product-card">
                    <img src="images\Pelet.png" alt="">
                    <div class="product-info">
                        <h4>Pakan Ternak Benefeed</h4>
                        <p class="price">Rp 200.000</p>
                        <p>9 JUL</p>
                    </div>
                </div>
                <div class="product-card">
                        <img src="images\Pelet1.png" alt="">
                        <div class="product-info">
                            <h4>Pakan Ternak Comfeed</h4>
                            <p class="price">Rp 180.000</p>
                            <p>29 DES</p>
                    </div>
                </div>
                <div class="product-card">
                        <img src="images\Pelet3.png" alt="">
                        <div class="product-info">
                                <h4>Pakan Ternak Gemilang</h4>
                                <p class="price">Rp 190.000</p>
                                <p>17 FEB</p>
                        </div>
                </div>
            </div>
        </div>
    </main>

    @include('part.footer')
    
</body>
</html>