<!DOCTYPE html>
<html lang="en">
<?php include 'head.php' ?>

<body>
    <?php include 'navbar.php' ?>

    <?php include 'slider.php' ?>
    <hr>
<!-- Start Paket -->
<section style="background-color:#18212b;" id="berita">
    <div class="container">
      <div class="row mb-3 py-2">
        <div class="col-md-12 " style="margin: auto;">
          <h2 style="text-align: center; color: White;">DAFTAR BERITA TERBARU</h2>
          <hr>
          <div class="row">
            <!--  -->
            <?php
            // ambil koneksi
            require 'admin/koneksi.php';
            // ambil isi/check data dari tb paket
            $query = "SELECT * FROM tbl_artikel";
            $sql = mysqli_query($koneksi, $query);
            // perulangan untuk memunculkan banyak paket
            while ($data = mysqli_fetch_object($sql)) {
            ?>
              <!-- munculkan perulangan dengan card -->

              <div class="col-md-3" style="margin-bottom: 20px;">


                <div class="card" style="width: 15rem; height: 24rem; border-radius: 10px;">
                  <h5 class="card-header" style="background-color: #18212b; color: whitesmoke;text-align: center;"><?= $data->judul; ?></h5>
                  <img src="admin/img/<?= $data->gambar; ?>" class="card-img-top" style="height: 140px;">

                  <div class="card-body">
                    <h5 class="card-title"><?= $data->keyword ?></h5>
                    <p class="card-text"><?= substr($data->isi, 0, 20) ?>...</p>
                  </div>
                  <div class="card-footer text-muted">
                    <div class="row">
                      <div class="col">
                        <p>ID : <?= $data->id; ?></p>
                      </div>
                      <div class="col">
                        <td></td>
                        <a type="button" class="btn btn-primary" href="detail.php?id=<?= $data->id; ?>">Detail</a>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            <?php
            }
            ?>
            <!--  -->

          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<?php include 'footer.php' ?>

</html>