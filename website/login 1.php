<?php

include "koneksi.php";
    if(isset($_POST['log'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql1 = "select * from pengguna where username = '$email' AND password = '$password'";
        $q1 = mysqli_query($koneksi,$sql1);
        if(mysqli_num_rows($q1) > 0){
            header("Location:web.php");
        }else{
            header("Location:login.php");
        }
    }
    if ($_get ['aksi']== "edit"){
        $id_pengguna = $_get ['id_pengguna'];
        $nama_pengguna = $_POST ['nama_pengguna'];
        $username = $_POST ['username'];
        $password = $_POST ['password'];

        $edit = mysqli_query($koneksi, "UPDATE pengguna set nama_pengguna = '$nama_pengguna', usernmae = '$username',
        password = '$password', where id_pengguna = '$id_pengguna'");

        if ($edit > 0){
        header("location: pengguna.php");
        }
    }else{
        $nama_pengguna = $_POST['nama_pengguna'];
        $username = $_POST['username'];
        $pass = $_POST['password'];

        $result = mysqli_query($koneksi, "INSERT INTO pengguna(nama_pengguna, username, password) values ('$nama_pengguna', '$username', '$password')");
        if ($result > 0 ){
            header("location: pengguna.php");
        }  
    }

        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">jangan salah memasukkan email dan password</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1"><br>
        </div>
        <button name="log" type="submit" class="btn btn-primary">Submit</button>


    </form>

</body>

</html>