<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <a href="login.php">Kembali Ke Home</a><br><br>
</head>

<body>
    <form action="" method="post">
        <table width="25%" border=0>
            <tr>
                <td> Nama pengguna</td>
                <td><input type="text" name="nama" value=<?= @$nama ?>></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value=<?= @$uname ?>></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value=<?= @$pass ?>></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <table class="table">
        <thead>
            <tr>
                <h1>Data Pengguna </h1>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $query = mysqli_query($koneksi, "SELECT * FROM pengguna");
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
                $id_pengguna = $data['id_pengguna'];
                echo "<tr>";
                echo "<td>" . $no;
                $no++ . "</td>";
                echo "<td>" . $data['nama_pengguna'] . "</td>";
                echo "<td>" . $data['username'] . "</td>";
                echo "<td>" . $data['password'] . "</td>";
                
            ?>
                <td> <a href="edit.php?id_pengguna=<?= $id_pengguna ?>">Edit</a>
                    <a href="hapus.php?id_pengguna=<?= $id_pengguna ?>">Hapus</a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </table>
    <?php
    include 'koneksi.php';

    if (isset($_POST['submit'])) {
        if (isset($_GET['aksi'])) {
            $id_pengguna = $_GET['id_pengguna'];
            $nama_pengguna = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $alamat = $_POST['alamat'];

            $edit = mysqli_query($koneksi, "UPDATE pengguna set nama_pengguna='$nama_pengguna',username='$username',password='$password', alamat'$alamat' where id_pengguna='$id_pengguna'");
            if ($edit > 0) {
                header("Location: admin.php");
            }
        } else {
            $nama_pengguna = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = mysqli_query($koneksi, "INSERT INTO pengguna(nama_pengguna,username,password) VALUES('$nama_pengguna','$username','$password')");
            if ($result > 0) {
                header("Location: admin.php");
            }
        }
    }

    ?>
</body>

</html>