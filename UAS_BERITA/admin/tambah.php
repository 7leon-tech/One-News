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
        <h2 class="alert alert-info mt-3"> TAMBAH BERITA </h2>
        <?php
        require 'koneksi.php';
        if (isset($_POST['simpan'])) {
            $txtjudul = $_POST['txtjudul'];
            $txtisi = $_POST['txtisi'];
            $txtpenulis = $_POST['txtpenulis'];
            $txtkeyword = $_POST['keyword'];
            $txtgambar = $_POST['gambar'];
            $sql = "INSERT INTO tbl_artikel VALUES (NULL, '$txtjudul', '$txtisi', '$txtpenulis', '$txtkeyword', '$txtgambar')";
            $query = mysqli_query($koneksi, $sql);
            if ($query) {
                header('location: index.php');
            } else {
                echo 'Query Error : ' . mysqli_error($koneksi);
            }
        }

        ?>
        
        <form action="#" method="POST">
            <div class="form-group mb-3">
                <label>Judul Berita</label>
                <input type="text" name="txtjudul" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Isi Berita</label>
                <textarea name="txtisi" class="form-control" cols="30" rows="5"></textarea>
            </div>

            <div class="form-group mb-3">
                <label>Penulis</label>
                <input type="text" name="txtpenulis" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Keyword</label>
                <select class="form-control" name="keyword">
                    <option selected value="news">News</option>
                    <option value="olahraga">Olahraga</option>
                    <option value="kesehatan">Kesehatan </option>
                </select>
            </div>
            
            <div class="form-group mb-3">
            <label for="exampleInputFile">Foto / Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar">
                    <!-- <label class="custom-file-label" id="foto" for="exampleInputFile">Pilih Gambar</label>
                 -->
                </div>
            </div>
            <div class="form-group mb-3">
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>