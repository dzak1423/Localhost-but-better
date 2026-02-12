<?php

// session adalah tempat menyimpan datasementara di server untuk meningatsiapa yang swdang siapa yang sedang login
session_start();
include "../Header/config.php";

//  jika tombol login diklik
if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
    $Nama = $_POST['nama'];
    $Password = $_POST['password'];


    // cek db
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$Nama' and password='$Password'");

    // kalau datanya ada
    if (mysqli_num_rows($query) == 1 ) {
        $data = mysqli_fetch_assoc($query);

        // simpan dalam session
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_admin'] = $data['Id_admin'];

        // kalau login berhasil kita arahkan ke index.php
        echo " <script>
            alert('Login Berhasil');
            window.location='admin.php';
        </script>
        ";
    } else {
        // Login gagal
        echo " <script>
        alert('Login Gagal waduuuh');
        window.location='login_admin.php';
        </script>
    ";
    }

};

?>