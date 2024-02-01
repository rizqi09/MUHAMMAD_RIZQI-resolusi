<?php
include "koneksi.php";
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header("Location: login.php");
}

$id = $_GET['i'];
// $sql1 = $koneksi->prepare("SELECT * FROM transaksi where id_transaksi=?");
$sql1 = "Select * from transaksi where id_transaksi = $id";
$q1  = mysqli_query($koneksi, $sql1);
$data = mysqli_fetch_assoc($q1);
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        * {
            font-family: 'Titillium Web', sans-serif;
        }

        .product {
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }

        table,
        th,
        tr {
            text-align: center;
        }

        .title2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        h2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        table th {
            background-color: #efefef;
        }
    </style>
</head>

<body>

    <div class="container" style="width: 65%">
        <?php
        // $koneksi = mysqli_connect("localhost","root","","product_details");
        // $id = $_GET['id'];

        //Menampilkan data pada tabel detail (id transaksi, nama barang dan jumlah barang)
        // $trans = "SELECT * FROM detail 
        // inner join trans on detail.id_trans = trans.id_trans 
        // where detail.id_trans='$id'";
        // $query = mysqli_query($koneksi, $trans);
        // $data = mysqli_fetch_array($query);
        ?>
        <div style="clear: both"></div>
        <h3 class="title2">Nota Pembelian</h3>
        <div class="table-responsive">
            <table class="table table-bordered my-3">
                Tanggal Pembelian: <?= $data['tgl_transaksi']
                                    ?> <br><br>
                <tr>
                    <th width="30%">Nama Barang</th>
                    <th width="10%">Qty</th>
                </tr>

                <?php
                $sql2 = "SELECT * FROM produk where id_produk = $data[id_produk]";
                $query2 = mysqli_query($koneksi, $sql2);
                while ($row = mysqli_fetch_array($query2)) {
                    $harga = $row['harga_produk'];
                ?>
                    <tr>
                        <td><?= $row["nama_produk"]
                            ?></td>
                        <td>1</td>
                    </tr>
                <?php }
                ?>
                <tr>
                    <td>Grand Total</td>
                    <td align="right">Rp <?php echo number_format($harga, 2);
                                            ?></td>
                </tr>

            </table>
        </div>

    </div>

    <script>
        window.print();
    </script>

</body>

</html>