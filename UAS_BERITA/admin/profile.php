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
   
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body row">
                            <?php
                            require 'koneksi.php';
                            $query = "SELECT * FROM tbl_profile_perusahaan";
                            $sql = mysqli_query($koneksi, $query);
                            while ($data = mysqli_fetch_object($sql)) {
                            ?>
                                <div class="col-4 text-center d-flex align-items-center justify-content-center">
                                    <div class="form-group offset-5">
                                        <img src="img/<?= $data->logo; ?>" height="300px" width="300px">
                                    </div>
                                </div>
                                <div class="col-5 offset-1">
                                    <div class="form-group mb-3">
                                        <label>Nama Perusahaan</label>
                                        <input type="text" name="nama_perusahaan" class="form-control" value="<?= $data->nama_perusahaan; ?>" readonly />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" value="<?= $data->alamat; ?>" class="form-control" readonly />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Telphone</label>
                                        <input type="text" name="telphone" class="form-control" value="<?= $data->telphone; ?>"  readonly />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" name="whatsapp" value="<?= $data->email; ?>" class="form-control" readonly />
                                    </div>
                                    <div class="form-group mb-3">
                                        <?php
                                        if ($_SESSION['hak_akses'] == 'admin') {
                                        ?>
                                            <a href="edit_profile.php?id=<?= $data->id_perusahaan; ?>"><input type="submit" class="btn btn-primary" name="edit" value="Edit"></a>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                        </div>
                    <?php
                            }
                    ?>
                    </div>

                </div>
            </div>
        </div>
    </section>   
</body>
    <?php include 'layout/footer.php'; ?>
</html>