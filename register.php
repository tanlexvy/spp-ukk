<?php 

include 'admin/koneksi.php';



?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
        /* Reset CSS untuk menghilangkan margin dan padding default */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Menyusun body dengan latar belakang gradasi warna modern */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        /* Kontainer utama dengan desain yang minimalis */
        .login-container {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(10px); /* Efek blur di belakang kontainer */
        }

        /* Heading login dengan font besar dan teks putih */
        .login-container h2 {
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Input dengan desain custom dan border yang unik */
        .login-container input {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 2px solid transparent;
            border-radius: 8px;
            background-color: #fff;
            color: #333;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        /* Efek saat input di-fokuskan (lebih menonjol) */
        .login-container input:focus {
            border-color: #2575fc;
            background-color: #e3f0fe;
            outline: none;
        }

        /* Tombol login dengan desain gradient dan efek hover */
        .login-container button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        /* Efek saat hover pada tombol login */
        .login-container button:hover {
            background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);
            transform: translateY(-2px);
        }

        /* Link "Lupa Password?" dan "Daftar" yang terletak di bawah tombol */
        .login-container .links {
            text-align: center;
            margin-top: 10px;
        }

        .login-container .links a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        /* Efek hover pada link */
        .login-container .links a:hover {
            text-decoration: underline;
        }

        /* Responsivitas pada ukuran layar lebih kecil */
        @media (max-width: 500px) {
            .login-container {
                padding: 20px;
            }
            .login-container h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Selamat Datang</h2>
        <form action="" method="POST">
            <input type="text" id="userName" name="username"  placeholder="Username" required>
            <input type="text" id="Name" name="Name"  placeholder="Name" required>
            <input type="password" id="password" name="password"  placeholder="Password" required>
            <button type="submit">Masuk</button>
        </form>
        <div class="links">
            <a href="#">Lupa Password?</a> | <a href="login.php">Login</a>
        </div>
    </div>

</body>
</html>
