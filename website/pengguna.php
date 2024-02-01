<?php
  include "koneksi.php"; 
  $no = 1;
  $query = mysqli_query($koneksi, "SELECT * FROM pengguna");
    while($data = mysqli_fetch_array($query)){
        $nama = $data['nama_pengguna'];
        $username = $data['username'];
        $pass = $data['password'];
    }


?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link href="css/login.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">nama_pengguna</th>
                <th scope="col">username</th>
                <th scope="col">password</th>
                <th scope="col">aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                 include "koneksi.php"; 
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM pengguna"); while($data = mysqli_fetch_array($query)){
                       
                        echo "<tr>";
                        echo "<td>".$no; $no++."</td>";
                        echo "<td>". $data ['nama_pengguna']."</td>";
                        echo "<td>". $data ['username']."</td>";
                        echo "<td>". $data ['password']."</td>";
                        echo "<td><a href ='pengguna.php'>edit</a></td>";
                        echo "</tr>";
                }
                
            ?>
        </tbody>
    </table>
</body>

</html>