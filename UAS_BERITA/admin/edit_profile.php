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
    <?php include 'layout/navbar.php'; ?>

    <?php
    require 'koneksi.php';
    if (isset($_POST['simpan'])) {
        $id = $_GET['id'];
        $nama_perusahaan = $_POST['nama_perusahaan'];
        $alamat = $_POST['alamat'];
        $telphone = $_POST['telphone'];
        $email = $_POST['email'];
        $txtgambar = $_POST['gambar'];
        $txtgambarupload = $_POST['gambarupload'];
        if ($txtgambar == "") {
            $txtgambar = $txtgambarupload;
        }
        $sql = "UPDATE tbl_profile_perusahaan SET nama_perusahaan='$nama_perusahaan', alamat='$alamat',
        telphone='$telphone', email='$email', logo='$txtgambar' WHERE id_perusahaan='$id'";
        $query = mysqli_query($koneksi, $sql);
        if ($query) {
            header('location: profile.php');
            echo "berhasil";
        } else {
            echo 'Query Error : ' . mysqli_error($koneksi);
        }
    }else{
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_profile_perusahaan";
        $sql = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_object($sql);
    } 
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body row">
                                <div class="col-5 offset-1">
                                <form action="edit_profile.php?id=<?= $data->id_perusahaan; ?>" method="POST">
                                        <div class="form-group">
                                    <div class="form-group mb-3">
                                        <label>Nama Perusahaan</label>
                                        <input type="text" name="nama_perusahaan" class="form-control" value="<?= $data->nama_perusahaan; ?>"/>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="<?= $data->alamat; ?>" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Telphone</label>
                                        <input type="text"  name="telphone" class="form-control" value="<?= $data->telphone; ?>"/>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="<?= $data->email; ?>" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="exampleInputFile">Logo Perusahaan</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar" value="<?= $data->logo ?>">
                                            <input type="hidden" class="custom-file-input" name="gambarupload" value="<?= $data->logo ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                    <input type="submit" class="btn btn-warning" value="Simpan" name="simpan"></a>
                                    </div>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    </div>

    <?php include 'layout/footer.php'; ?>
</body>

</html>