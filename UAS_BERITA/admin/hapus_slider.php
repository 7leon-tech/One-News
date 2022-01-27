<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.php');
}
?>

<?php
    if (isset($_GET['id'])) {
        require 'koneksi.php';

        $id = $_GET['id'];
        $query = "DELETE FROM tbl_slide WHERE id_slide ='$id'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header('location: slider.php');
        } else {
            echo 'Data Gagal Terhapus' . mysqli_error($koneksi);
        }
    }
?>  