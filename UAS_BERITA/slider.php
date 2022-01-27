<!-- section carousel -->
<section class="container-fluid " style="background-color:#18212b;">
    <div class="row--3 mt-3">
      <div class="col-lg-8 py-1" style="margin: auto;">

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>  
        </div>
          <!-- <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="admin/img/c.jpg" class="d-block w-100" style="height: 300px; border-radius:20px;" alt="...">
            </div>
            <div class="carousel-item">
              <img src="admin/img/b.jpeg" class="d-block w-100" style="height: 300px; border-radius:20px;" alt="...">
            </div>
            <div class="carousel-item">
              <img src="admin/img/d.jpg" class="d-block w-100" style="height: 300px; border-radius:20px;" alt="...">
            </div>
          </div> -->
        <div class="carousel-inner">
        <?php
        require 'admin/koneksi.php';
        $query = "SELECT * FROM tbl_slide";
        $sql = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_object($sql);
        ?>
        
        <div class="carousel-item active">
            <img src="admin/img/<?= $data->gambar; ?>" class="d-block w-100" alt="..." style="height: 60vh;">
        </div>

        <?php
        require 'admin/koneksi.php';
        $query = "SELECT * FROM tbl_slide";
        $sql = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_object($sql)) {
        ?>
            <div class="carousel-item">
                <img src="admin/img/<?= $data->gambar; ?>" class="d-block w-100" alt="..." style="height: 60vh;">
            </div>
        <?php
        }
        ?>
        </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </section>
  <!-- end carousel -->
