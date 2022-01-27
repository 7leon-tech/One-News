<?php
require 'koneksi.php';
$query = "SELECT * FROM tbl_profile_perusahaan";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_object($sql);

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <img src="img/<?= $data->logo; ?>" width="70px" height="50px" alt=""> 
    <a class="navbar-brand" href="index.php">| One-News</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Data Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="slider.php">Slider</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="profile.php">Profile Perusahaan</a>
        </li>

      </ul>
      <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="logout.php" style="color:white" class="nav-link btn btn-secondary" onclick="return confirm('Yakin logout ?')"> Logout</a>
          </li>
        </ul>
      </form>
    </div>
  </div>
</nav>