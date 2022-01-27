<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<?php include 'layout/head.php'; ?>
<body>
<?php include 'layout/navbar.php'; ?>
    <div class="container">
        <h2 class="alert alert-info mt-3">Selamat Datang : <?php echo $_SESSION['nama']; ?></h2>

        <a href="tambah_slider.php" class="btn btn-info mb-3"> TAMBAH DATA </a>
        
        <table class="table table-warning table-bordered">
            <thead class="table table-dark">
                <tr>
                    <th>NO</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'koneksi.php';
                $query = "SELECT * FROM tbl_slide";
                $sql = mysqli_query($koneksi, $query);
                $no = 1;
                while ($data = mysqli_fetch_object($sql)) {
                ?>
                <tr>
                    <td> <?php echo $no++ ?> </td>
                    <td> <a href="img/<?= $data->gambar; ?>"><?= $data->gambar; ?></a></td>
                    <td>
                        <a href="edit_slider.php?id=<?= $data->id_slide;?>">
                            <input type="submit" value="edit" class="btn btn-warning">
                        </a>
                        <?php
                        if ($_SESSION['hak_akses'] == 'admin') { 
                        ?>
                        <a href="hapus_slider.php?id=<?= $data->id_slide;?>">
                            <input type="submit" value="hapus" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-danger">
                        </a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php include 'layout/footer.php'; ?>
</html>