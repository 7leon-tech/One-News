<?php
session_start();
require 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['txtusername'];
    $password = sha1($_POST['txtpassword']);

    $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username' and password='$password'");

if(mysqli_num_rows($query) === 1) {
    header('location: index.php');

    $data = mysqli_fetch_object($query);

    $_SESSION ['login'] = true;
    $_SESSION['nama']=$data->nama;
    $_SESSION['hak_akses']=$data->hak_akses;
}
echo $error = 'Username atau Password Salah';
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'layout/head.php'; ?>
<head>
<link rel="stylesheet" type="text/css" href="https://parsleyjs.org/src/parsley.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="https://parsleyjs.org/dist/i18n/id.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row mt-3">
            <div class="col-md-5 offset-4">
                <div class="card card-body">
                    <h3>Login Form</h3>
                    <form action="" method="POST" id="form" data-parsley-validate>
                        <input type="text" name="txtusername"
                        class="form-control mb-3" placeholder="Masukan Username"required data-parsley-trigger="keyup">

                        <input type="password" name="txtpassword"
                        class="form-control mb-3" placeholder="Masukan Password" required data-parsley-trigger="keyup">

                        <input type="submit" value="Login" name="login"
                        class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('#form').parsley();
</script>
</html>