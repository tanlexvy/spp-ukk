<?php
session_start();
require_once("admin/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Menggunakan MD5 untuk hash password

    $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        //$_SESSION['login_type'] = "login";
        $_SESSION["id_user"] = $row["id_user"];
        $_SESSION["nama_user"] = $row["nama_lengkap"];
        $_SESSION["peran"] = $row["peran"];

        // Cek peran user dan arahkan ke halaman yang sesuai
        if ($row["peran"] == "admin") {
            // Jika admin, arahkan ke dashboard admin
            echo '<script language="javascript" type="text/javascript">
                alert("Selamat Datang '.$_SESSION["nama_user"].', Anda Berhasil Login sebagai Admin!");</script>';
            echo "<meta http-equiv='refresh' content='0; url=admin/index.php'>"; // Halaman admin
        } elseif ($row["peran"] == "pemegang uang") {
            // Jika petugas, arahkan ke dashboard petugas
            echo '<script language="javascript" type="text/javascript">
                alert("Selamat Datang '.$_SESSION["nama_user"].', Anda Berhasil Login sebagai Petugas!");</script>';
            echo "<meta http-equiv='refresh' content='0; url=petugas/dashboard.php'>"; // Halaman petugas
        } elseif ($row["peran"] == "siswa") {
            // Jika siswa, arahkan ke halaman siswa
            echo '<script language="javascript" type="text/javascript">
                alert("Selamat Datang '.$_SESSION["nama_user"].', Anda Berhasil Login sebagai Siswa!");</script>';
            echo "<meta http-equiv='refresh' content='0; url=admin/index_siswa.php'>"; // Halaman siswa
        } else {
            // Jika peran tidak valid, logout
            session_destroy();
            echo '<script language="javascript" type="text/javascript">
                alert("Peran tidak dikenali. Silakan coba lagi.");</script>';
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }

        exit();
    } else {
        echo '<script language="javascript" type="text/javascript">
            alert("Maaf Username dan Password Salah.!");</script>';
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
}
?>
