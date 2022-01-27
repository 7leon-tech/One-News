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
        <h2 class="alert alert-info mt-3"> EDIT SLIDER </h2>
        <?php
        require 'koneksi.php';
        if (isset($_POST['simpan'])) {
            $id = $_GET['id'];
            $txtgambar = $_POST['gambar'];
            $txtgambarupload = $_POST['gambarupload'];
            if ($txtgambar == "") {
                $txtgambar = $txtgambarupload;
            }   
            $sql = "UPDATE tbl_slide SET gambar='$txtgambar' WHERE id_slide=$id";
            $query = mysqli_query($koneksi, $sql);

            if ($query) {
                header('location: slider.php');
            } else {
                echo 'Query Error : ' . mysqli_error($koneksi);
            }
        } else {
            $id = $_GET['id'];
            $query = "SELECT * FROM tbl_slide WHERE id_slide=$id";
            $sql = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_object($sql);
        }

        ?>

        <form action="edit_slider.php?id=<?= $data->id_slide; ?>" method="POST">

            <div class="form-group mb-3">
                <label for="exampleInputFile">Foto / Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar" value="<?= $data->gambar ?>">
                    <input type="hidden" class="custom-file-input" name="gambarupload" value="<?= $data->gambar ?>">
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