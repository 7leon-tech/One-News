<!DOCTYPE html>
<html lang="en">

   <?php include 'head.php'?>

<body style="background-color: #18212b;">
    <?php include 'navbar.php'?>
    <?php
    require 'admin/koneksi.php';
    //menampilan data dalam table
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_artikel WHERE id ='$id'";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_object($result);
    }
    ?>
    <div class="container" style="background-color: #18212b;">
        <div class="col py-3" style="justify-self: center;" >
            <div class="card" style="width: 27rem;margin-top: 20px;margin-right: auto;margin-bottom: auto;margin-left: auto;">
                <img src="admin/img/<?= $data->gambar; ?>" class="card-img-top" height="300px" width="100px" alt="...">
                <div class="card-body">
                    <p class="card-text"><b>ID :</b>  <?= $data->id; ?></p>
                    <hr>
                    <p class="card-title"><b>Judul Berita : </b><?= $data->judul; ?></p>
                    <p style="text-align: justify;" class="card-text"><i>Keyword : <i><?= $data->keyword; ?></p>
                    <p class="card-text"><?= $data->isi; ?></p>
                    <hr>
                    <p class="card-text"><b><i>Penulis :<i></b><?= $data->penulis; ?></p>
                </div>
                <div class="card-body">
                <a type="button" class="btn btn-primary" href="index.php">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'footer.php'?>
</html>