<?php
ob_start();

include "../Header/Header.php";
include "../Header/config.php";

// ambil id dari URL
$id = $_GET['id'] ?? null;

// proses delete
mysqli_query(
    $koneksi,
    "DELETE FROM tbl_admin WHERE id_admin ='$id'"
);

// redirect
header("Location: admin.php");
exit;


?>