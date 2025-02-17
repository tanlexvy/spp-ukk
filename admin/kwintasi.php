<?php 
include 'koneksi.php';

$id = $_GET['nisn'];
$idspp = $_GET['idspp'];
$datas = mysqli_query($koneksi, "SELECT * FROM tb_spp, tb_siswa, tb_ta, tb_kelas WHERE id_siswa=siswa_id AND id_ta=ta_id AND id_ta=taid AND id_kelas=kelas AND id_siswa='$id' AND id_spp='$idspp'");
$rs = mysqli_fetch_assoc($datas);
$jumlah_bayar = $rs['jumlah_bayar'];
$tanggal = $rs['tgl_bayar'];
$bulan = $rs['bulan_bayar'];

function terbilang($angka) {
    $bilangan = array(
        '', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima',
        'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh',
        'Sebelas'
    );

    if ($angka < 12) {
        return $bilangan[$angka];
    } elseif ($angka < 20) {
        return $bilangan[$angka - 10] . ' Belas';
    } elseif ($angka < 100) {
        return $bilangan[floor($angka / 10)] . ' Puluh ' . $bilangan[$angka % 10];
    } elseif ($angka < 200) {
        return 'Seratus ' . terbilang($angka - 100);
    } elseif ($angka < 1000) {
        return terbilang(floor($angka / 100)) . ' Ratus ' . terbilang($angka % 100);
    } elseif ($angka < 2000) {
        return 'Seribu ' . terbilang($angka - 1000);
    } elseif ($angka < 1000000) {
        return terbilang(floor($angka / 1000)) . ' Ribu ' . terbilang($angka % 1000);
    }
}
$terbilang = terbilang($jumlah_bayar);

//tanggal
setlocale(LC_TIME, 'id_ID');
$format_tanggal = strftime('%d %B %Y', strtotime($tanggal));

//bulan
setlocale(LC_TIME, 'id_ID');
$bulan_format_indonesia = strftime('%B %Y', strtotime($bulan));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STIS Receipt</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #1f1c2c, #928dab);
            color: #fff;
        }
        .card {
            background: linear-gradient(to right, #434343, #000000);
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }
        .receipt-header {
            background: linear-gradient(to right, #ff4e50, #f9d423);
            color: #fff;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .receipt-header img {
            width: 70px;
        }
        .receipt-title {
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.5rem;
        }
        .table {
            color: #ddd;
        }
        .table th {
            border-bottom: 1px solid #555;
        }
        .table td {
            border-top: 1px solid #555;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .footer {
            background: linear-gradient(to right, #ff4e50, #f9d423);
            color: #000;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        .text-muted {
            font-size: 0.9rem;
        }
        @media print {
            body {
                background: #fff;
                color: #000;
            }
            .card {
                background: #fff;
                box-shadow: none;
                color: #000;
            }
            .receipt-header, .footer {
                background-color: #f9d423 !important;
                color: #000 !important;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="receipt-header">
                    <div class="receipt-title">Sentinel Technology International School</div>
                        <div class="receipt-title">Payment Receipt</div>
                        <p>Transaction Details</p>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center mb-4">Student Information</h5>
                        <hr class="bg-light">
                        <p><strong>NSIN:</strong> <?php echo $rs['nisn']; ?></p>
                        <p><strong>Name:</strong> <?php echo $rs['nama_siswa']; ?></p>
                        <p><strong>Class:</strong> <?php echo $rs['nama_kelas']; ?></p>
                        <p><strong>Academic Year:</strong> <?php echo $rs['ta']; ?></p>
                        <hr class="bg-light">
                        <h5 class="text-center mb-4">Payment Details</h5>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Payment Date</th>
                                    <th>Amount Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $bulan_format_indonesia; ?></td>
                                    <td><?php echo $rs['tahun_bayar']; ?></td>
                                    <td><?php echo $format_tanggal; ?></td>
                                    <td><strong><?php echo "Rp. " .number_format($rs['jumlah_bayar']). ",-"; ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-muted mt-3"><em>Amount in Words: <strong><?php echo $terbilang; ?> Rupiah</strong></em></p>
                    </div>
                    <div class="footer">
                        Total Payment: Rp. <?php echo number_format($rs['jumlah_bayar']); ?>,-
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.print();
    </script>
</body>
</html>
