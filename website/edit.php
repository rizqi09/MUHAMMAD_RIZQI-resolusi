<?php
    include 'koneksi.php';

    if (isset($_GET['id_pengguna'])){
        $id_pengguna = $_GET['id_pengguna'];
        $result = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");

        if($result) {
            $data = mysqli_fetch_assoc($result);
            if($data) {
                $nama = $data['nama_pengguna'];
                $uname = $data['username'];
                $pass = $data['password'];
            } else {
                echo "Data tidak ditemukan.";
            }
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
    else {
        header("Location: admin.php");
    }
?>

<?php
include "koneksi.php";
if(isset($_POST['submit'])){
    $id_pengguna = $_GET['$id_pengguna'];
    $nama_pengguna = $_POST['$nama_pengguna'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $edit = mysqli_query($koneksi, "UPDATE pengguna SET nama = '$nama_pengguna', username = '$username', password = '$password' WHERE id_pengguna = '$id_pengguna'");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengguna</title>
</head>

<body>
    <form action="admin.php?aksi=edit&id_pengguna=<?php echo $_GET['id_pengguna']; ?>" method="post">
        <table width="25%" border=0>
            <tr>
                <td> Nama pengguna</td>
                <td><input type="text" name="nama" value="<?php echo @$nama; ?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo @$uname; ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value="<?php echo @$pass; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Edit"></td>
            </tr>
        </table>
    </form>
</body>

</html>