<?php
include "../Header/Header.php";
include "../Header/config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //lokasi tujuan foto
    $folder = "../../asset.siswa/img";

    //Ambil data
    $namaFile = $_FILES['foto']['name'];
    $tmpFile = $_FILES['foto']['tmp_name'];

    //$_FILES['foto']['name'];
    //$_FILES adalah variabel bawaan php untuk menampung data file di-upload.
    // [foto] : name yang ada di form . [name] untuk mengambil nama asli file yang di-upload oleh user.

    //bikin nama unik biar ga nabrak
    $namabaru = time() . "_" . $namaFile;

    // Pindahkan file
    move_uploaded_file($tmpFile, $folder . $namabaru);

    mysqli_query(
        $koneksi,
        "INSERT INTO tbl_admin(nama, username, password, foto) VALUES ('$nama', '$username', '$password', '$namabaru')"
    );
}
?>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Data calon</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Nama" class="form-control-label">nama</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" id="nama" placeholder="Input nama" name="nama">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Kelas" class="form-control-label">password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" value="" id="password" placeholder="Input password" name="password">
                    </div>  
                <div class="form-group">
                    <label for="Kelas" class="form-control-label">username</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" id="username" placeholder="Input username" name="username">
                    </div>  
                </div>    <div class="form-group">
                    <label for="Alamat" class="form-control-label">Foto</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="foto">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>