<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head.php'?>
</head>
<body>
<?php include 'navbar.php'?>  
        <div class="container-fluid" style="background-color: #18212b;">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="background-color: #18212b;">
                        <div class="card-body row" style="background-color:#18212b;">
                            <?php
                            require 'admin/koneksi.php';
                            $query = "SELECT * FROM tbl_profile_perusahaan";
                            $sql = mysqli_query($koneksi, $query);
                            while ($data = mysqli_fetch_object($sql)) {
                            ?>
                                <div class="col-4 text-center d-flex align-items-center justify-content-center">
                                    <div class="form-group offset-5">
                                        <img src="admin/img/<?= $data->logo; ?>" height="300px" width="300px">
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
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>
 
</body>
<?php include 'footer.php'?>
</html>