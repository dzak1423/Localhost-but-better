<?php
ob_start();

include "../Header/Header.php";
include "../Header/config.php";

// ambil id dari URL
$id = $_GET['id'] ?? null;

// proses delete
mysqli_query(
    $koneksi,
    "DELETE FROM tbl_siswa WHERE id_siswa ='$id'"
);

// redirect
header("Location: siswa.php");
exit;


?>