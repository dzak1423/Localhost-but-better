<?php
ob_start();

include "../Header/Header.php";
include "../Header/config.php";

// ambil id dari URL
$id = $_GET['id'] ?? null;

// proses delete
mysqli_query(
    $koneksi,
    "DELETE FROM tbl_calon WHERE id_calon ='$id'"
);

// redirect
header("Location: calon.php");
exit;


?>