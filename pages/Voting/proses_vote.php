<?php
session_start();
include "../Header/config.php";
    
$current_page = basename ($_SERVER['PHP_SELF']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_calon = $_POST['id_calon'];
    $tanggal = date("Y-m-d H:i:s");

    // SImpam voting

    $query = mysqli_query(
        $koneksi,
        "INSERT INTO tbl_voting (id_calon, tanggal, id_siswa) VALUES
        ('$id_calon', '$tanggal', '')"
    );
}

?>
