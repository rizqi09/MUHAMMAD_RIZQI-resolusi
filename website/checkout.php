<?php

include "koneksi.php";
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Checkout</title>
    <link rel="stylesheet" href="checkout.css">
    <style>
        .bg {
            background-image: url(coffie/coffiegulaare.jpg);
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="bg d-flex justify-content-center align-items-center mt-5 pt-5" style="height: 100vh;">
        <br><br><br><br><br>
        <div class="container">
            <h1>Checkout</h1>
            <form action="" method="post">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= $_SESSION['username'] ?>" required readonly><br>

                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required></textarea><br>

                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select id="metode_pembayaran" name="metode_pembayaran" required>
                    <option value="transfer">Transfer Bank</option>
                    <option value="paypal">gopay atau linkaja</option>
                    <option value="kartu_kredit">Kartu Kredit atau cash</option>
                </select><br>
                <input type="submit" value="Checkout" name="checkout">
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['checkout'])) {
    $id_produk = $_GET['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $payment = $_POST['metode_pembayaran'];

    $sql1 = "insert into transaksi (id_pengguna,id_produk,nama_pengguna,alamat,payment,tgl_transaksi) VALUES ('$id','$id_produk','$nama','$alamat', '$payment', NOW())";

    $q1 = mysqli_query($koneksi, $sql1);
    $last_id = mysqli_insert_id($koneksi);

    if ($q1) {
        header('Location: cetak.php?i=' . $last_id);
    }
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $nama = $_POST["nama"];
//     $alamat = $_POST["alamat"];
//     $metode_pembayaran = $_POST["metode_pembayaran"];

//     // Di sini Anda dapat memproses data lebih lanjut, seperti menyimpannya dalam database.

//     // Contoh: Menyimpan data ke database
//     $koneksi = mysqli_connect("localhost", "username", "password", "nama_database");
//     $query = "INSERT INTO checkout (nama, alamat, metode_pembayaran) VALUES ('$nama', '$alamat', '$metode_pembayaran')";
//     mysqli_query($koneksi, $query);

//     echo "Terima kasih, $nama! Pesanan Anda akan segera diproses.";
// }
?>