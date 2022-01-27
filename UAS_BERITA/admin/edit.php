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
        <h2 class="alert alert-info mt-3"> EDIT BERITA </h2>
        <?php
                require 'koneksi.php';
                if (isset($_POST['simpan'])) {
                    $id = $_GET['id'];
                    $txtjudul = $_POST['txtjudul'];
                    $txtisi = $_POST['txtisi'];
                    $txtpenulis = $_POST['txtpenulis'];
                    $txtkeyword = $_POST['keyword'];
                    $txtgambarupload = $_POST['gambarupload'];
                    $txtgambar = $_POST['gambar'];
                    if ($txtgambar == "") {
                        $txtgambar = $txtgambarupload;
                    }

                    $sql = "UPDATE tbl_artikel SET
                        id='$id', judul='$txtjudul' , isi='$txtisi', penulis='$txtpenulis',
                        keyword='$txtkeyword', gambar='$txtgambar' WHERE id=$id";
                    
                    $query = mysqli_query($koneksi, $sql);
                    if ($query){
                        header('location: index.php');
                    }else {
                        echo 'Query Error : ' . mysqli_error($koneksi);
                    }
                }else {
                    $id=$_GET['id'];
                    $query= "SELECT * FROM tbl_artikel WHERE id=$id";
                    $sql = mysqli_query($koneksi, $query);
                    $data = mysqli_fetch_object($sql);
                }
                ?>

        <form action="edit.php?id=<?= $data->id; ?>" method="POST">
            <!-- <input type= "hidden" name="txtid" value="<?=$id?>"> -->
            <div class="form-group mb-3">
                <label>Judul Berita</label>
                <input type="text" name="txtjudul" class="form-control" value="<?=$data->judul;?>">
            </div>

            <div class="form-group mb-3">
                <label>Isi Berita</label>
                <textarea name="txtisi" class="form-control" cols="30" rows="5" required>
                <?=$data->isi;?>
                </textarea>
            </div>

            <div class="form-group mb-3">
                <label>Penulis</label>
                <input type="text" name="txtpenulis" class="form-control" value="<?=$data->penulis;?>">
            </div>

            <div class="form-group mb-3">
                <label>Keyword</label>
                <select class="form-control" name="keyword" value="<?=$data->keyword;?>">
                <option value="news">News</option>
                    <option value="olahraga">Olahraga</option>
                    <option value="kesehatan">Kesehatan </option>
                </select>
            </div>
            
            <div class="form-group mb-3">
            <label for="exampleInputFile">Foto / Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar" value="<?=$data->gambar;?>">
                    <input type="hidden" class="custom-file-input" name="gambarupload" value="<?= $data->gambar ?>">
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