<?php
include "koneksi.php";
// session_start();
session_start();
if (isset($_POST['log'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $mysql = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'");
    $data = mysqli_fetch_assoc($mysql);
    if (mysqli_num_rows($mysql) > 0) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['id'] = $data['id_pengguna']; //gakebaca
        header('location:index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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