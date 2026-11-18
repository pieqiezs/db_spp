<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Ke Aplikasi/Website</title>
</head>
<body>

<?php
if (isset($_POST['username'])) {
    $nama     = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $cek_username = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    
    if (mysqli_num_rows($cek_username) > 0) {
    
        echo '<script>alert("Pendaftaran gagal: Username sudah terdaftar! Silakan gunakan username lain.");</script>';
    } else {

        $query = mysqli_query($koneksi, "INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password')");

        if ($query) {
            echo '<script>alert("Pendaftaran berhasil! Silakan login."); location.href="login.php";</script>';
        } else {
            echo '<script>alert("Pendaftaran gagal, silakan coba lagi.");</script>';
        }
    }
}
?>

    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Pendaftaran User</h3>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Daftar User</button>
                    <a href="Login.php">Login</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
