<?php
include "../Header/config.php";
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: admin.php");
    exit;
}
$query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id_admin = '$id'");
$admin = mysqli_fetch_assoc($query);


if (!$admin) {
    header("Location: admin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = $_POST['nama'];
    $username   = $_POST['username'];

    if ($_FILES['foto']['nama'] != "") {
        $foto = $_FILES['foto']['name'];
        $tmpFile = $_FILES['foto']['tmp_name'];

        $folder = "../../asset.siswa/img/";

        move_uploaded_file($tmpFile, "$folder" . $foto);
        
        $sql = "UPDATE tbl_admin set 
        nama='$nama', 
        foto='$foto' 
        WHERE id_admin='$id'";

    } else {
      $sql = "UPDATE tbl_admin SET 
      nama='$nama', 
      foto='$foto'
      WHERE id_admin='$id'";
    }
    $query = mysqli_query($koneksi, $sql);

    $update = mysqli_query($koneksi, "
        UPDATE tbl_admin SET
            nama = '$nama',
            username = '$username'
        WHERE id_admin = '$id';
    ");

    if ($update) {
        header("Location: admin.php");
        exit;
    } else {
        die("Gagal update: " . mysqli_error($koneksi));
    }  
}
include "../Header/Header.php";
?>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">

        <div class="card-header pb-0">
          <h6>Edit Data admin</h6>
        </div>

        <div class="card-body px-0 pt-0 pb-2">
          <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label class="form-control-label">Nama</label>
              <input
                type="text"
                class="form-control"
                name="Nama"
                value="<?= htmlspecialchars($admin['nama']) ?>"
              >
            </div>

            <div class="form-group">
              <label class="form-control-label">username</label>
              <input
                type="text"
                class="form-control"
                name="username"
                value="<?= htmlspecialchars($admin['username']) ?>"
              >
            </div>

            <div class="form-group">
              <label class="form-control-label">password</label>
              <input
                type="text"
                class="form-control"
                name="password"
                value="<?= htmlspecialchars($admin['password']) ?>"
              >
            </div>


            <div class="form-group">
              <label class="form-control-label">foto</label> <br>
                <div>
                   <img src="../../asset.siswa/img<?= $data['foto'] ?>"
                   class="avatar avatar-md me-3c cirle"
                   style="object-ft: cover;" alt="user">
                </div>
              <input
                type="file"
                class="form-control"
                name="foto"
                value="<?= htmlspecialchars($admin['foto']) ?>"
              >
            </div>

            <button type="submit" class="btn btn-primary mg-2">
              Update
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
