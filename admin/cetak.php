<?php
// Koneksi ke database (gunakan koneksi sesuai dengan konfigurasi Anda)
include 'koneksi.php';

// Ambil data dari tabel spp berdasarkan tahun
$tahun = $_GET['tahun']; 

// Query untuk mengambil data dari database
$data1 = "SELECT * FROM tb_spp, tb_siswa, tb_ta WHERE id_siswa=siswa_id AND id_ta=ta_id AND id_ta=taid AND ta_id='$tahun' AND taid='$tahun'";
$result = mysqli_query($koneksi, $data1);

// Buat file HTML dengan header dan layout yang lebih baik
$filename = "laporan_spp.doc"; // Nama file yang akan diunduh
$header = "
<html>
<head>
    <title>Laporan Pembayaran SPP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        h2 {
            text-align: center;
            font-size: 20px;
            color: #333;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <center>
        <h2>Tuition Fee Report<br>Nusantara Vocational High School</h2>
    </center>
    <table>
        <tr>
            <th>Academic Year</th>
            <th>Student's Name</th>
            <th>Payment Date</th>
            <th>Payment Monthr</th>
            <th>Payment Year</th>
            <th>Amount Paid</th>
            <th>Payment Method</th>
            <th>Payment Status</th>
        </tr>
";

// Membuka file untuk menulis
$file = fopen($filename, 'w');
fwrite($file, $header);

// Menulis data ke dalam file HTML
while ($row = mysqli_fetch_assoc($result)) {
    // Mengatur status pembayaran
    if ($row['status_bayar'] == 1) {
        $sts = "Sudah Bayar";
    } else {
        $sts = "Belum Bayar";
    }

    // Format tanggal
    setlocale(LC_TIME, 'id_ID');
    $tanggal = strftime('%d %B %Y', strtotime($row['tgl_bayar']));

    // Format bulan/tahun
    $bln_format = strftime('%B %Y', strtotime($row['bulan_bayar']));

    // Menulis baris data
    $line = "<tr>
                <td>" . $row['ta'] . "</td>
                <td>" . $row['nama_siswa'] . "</td>
                <td>" . $tanggal . "</td>
                <td>" . $bln_format . "</td>
                <td>" . $row['tahun_bayar'] . "</td>
                <td>Rp. " . number_format($row['jumlah_bayar']) . ",-</td>
                <td>" . $row['metode_bayar'] . "</td>
                <td>" . $sts . "</td>
            </tr>";
    fwrite($file, $line);
}

// Footer
$footer = "
    </table>
    <div class='footer'>
        <p>Compiled by : Finance Division of Nusantara 1 Vocational High School</p>
        <p>Released by : Nusantara 1 Ciputat Vocational High School</p>
        <p>Authorized by : Principal of Nusantara Vocational High School 1</p>
        <p>Data Released: " . date('d F Y') . "</p>
    </div>
</body>
</html>
";
fwrite($file, $footer);

// Menutup file
fclose($file);

// Mengarahkan pengguna untuk mengunduh file
header("Content-Type: application/msword"); // Mengatur header untuk file Word
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Length: " . filesize($filename));
readfile($filename);

// Hapus file setelah diunduh
unlink($filename);
?>
