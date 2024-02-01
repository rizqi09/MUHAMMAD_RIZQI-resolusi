<?php
 include "koneksi.php";
 $hapus = mysqli_query($koneksi, "DELETE FROM pengguna WHERE id_pengguna = '$_GET[id_pengguna]'");
 if($hapus){
    header("location: admin.php");
 }
?>