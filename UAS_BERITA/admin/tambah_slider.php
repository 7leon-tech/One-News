<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'layout/head.php'; ?>

<body>
    <?php include 'layout/navbar.php' ?>
    <div class="container">
        <h2 class="alert alert-info mt-3"> TAMBAH SLIDER </h2>
        <?php
        require 'koneksi.php';
        if (isset($_POST['simpan'])) {
            $txtgambar = $_POST['gambar'];
            $sql = "INSERT INTO tbl_slide VALUES (NULL,'$txtgambar')";
            $query = mysqli_query($koneksi, $sql);
            if ($query) {
                header('location: slider.php');
            } else {
                echo 'Query Error : ' . mysqli_error($koneksi);
            }
        }

        ?>
        
        <form action="#" method="POST">
            <div class="form-group mb-3">
            <label for="exampleInputFile">Foto / Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar">
                </div>
            </div>
            <div class="form-group mb-3">
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                <a href="slider.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>