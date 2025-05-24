<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JogFarm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .header {
            background-color: #000;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo {
            display: flex;
            align-items: center;
        }

        .header .logo i {
            font-size: 24px;
            margin-right: 10px;
        }

        .header nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .header .search-container {
            display: flex;
            align-items: center;
        }

        .header .search-container input {
            padding: 5px;
            border: none;
            border-radius: 4px;
        }

        .header .search-container button {
            background: none;
            border: none;
            color: white;
            margin-left: 5px;
            cursor: pointer;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px);
            padding: 20px;
        }

        .main .program-info, .main .login-form {
            width: 300px;
            text-align: center;
            margin: 0 20px;
        }

        .main .program-info {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
        }

        .main .program-info h2 {
        }

        .main .login-form {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .main .login-form input[type="email"], .main .login-form input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .main .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #1C4928;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .main .login-form .remember {
            text-align: left;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    @include('part.header')

    <div class="main">
        <div class="program-info">
            <h2>JOGFARM</h2>
            <img src="images/bglogin.png" alt style="width: 100%; height: auto;">
            <div class="background-photo"></div>
        </div>
        <div class="login-form">
            <h2>Daftar Pengguna Pengguna</h2>
            <input type="email" placeholder="Nama Lengkap">
            <input type="email" placeholder="No. Telepon">
            <input type="email" placeholder="Tanggal Lahir">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">
            <button>Daftar</button>
        </div>
    </div>

    @include('part.footer')

</body>
</html>