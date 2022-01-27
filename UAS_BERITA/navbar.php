<?php
require 'admin/koneksi.php';
$query = "SELECT * FROM tbl_profile_perusahaan";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_object($sql);

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
    <img src="admin/img/<?= $data->logo; ?>" width="70px" height="50px" alt="" class="d-inline-block align-text-middle"> | One-News
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="../UAS_BERITA/index.php#berita"> Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="profile_perusahaan.php">Profile Perusahaan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>