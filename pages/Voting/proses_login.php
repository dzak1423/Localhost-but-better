<?php

// session adalah tempat menyimpan datasementara di server untuk meningatsiapa yang swdang siapa yang sedang login
session_start();
include "../Header/config.php";

//  jika tombol login diklik
if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
    $Name = $_POST['Name'];
    $Password = $_POST['pass'];


    // cek db
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE nama='$Name' and password='$Password'");

    // kalau datanya ada
    if (mysqli_num_rows($query) == 1 ) {
        $data = mysqli_fetch_assoc($query);

        // simpan dalam session
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['id_siswa'] = $data['Id_siswa'];

        // kalau login berhasil kita arahkan ke index.php
        echo " <script>
            alert('Login Berhasil');
            window.location='Voting2/index.php';
        </script>
        ";
    } else {
        // Login gagal
        echo " <script>
        alert('Login Gagal waduuuh');
        window.location='login.php';
        </script>
    ";
    }

};

?>