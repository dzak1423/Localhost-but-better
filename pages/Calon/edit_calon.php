<?php
include "../Header/config.php";
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: calon.php");
    exit;
}
$query = mysqli_query($koneksi, "SELECT * FROM tbl_calon WHERE id_calon = '$id'");
$calon = mysqli_fetch_assoc($query);


if (!$calon) {
    header("Location: calon.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $visi = $_POST['visi'];

    if ($_FILES['foto']['nama'] != "") {
        $foto = $_FILES['foto']['name'];
        $tmpFile = $_FILES['foto']['tmp_name'];

        $folder = "../../asset.siswa/img/";

        move_uploaded_file($tmpFile, "$folder" . $foto);
        
        $sql = "UPDATE tbl_calon set 
        nama='$nama', 
        visi='$visi',
        foto='$foto' 
        WHERE id_calon='$id'";

    } else {
      $sql = "UPDATE tbl_calon SET 
      nama='$nama', 
      visi='$visi', 
      foto='$foto'
      WHERE id_calon='$id'";
    }
    $query = mysqli_query($koneksi, $sql);

    $update = mysqli_query($koneksi, "
        UPDATE tbl_calon SET
            nama = '$nama',
            email = '$email'
        WHERE id_calon = '$id';
    ");

    if ($update) {
        header("Location: calon.php");
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
          <h6>Edit Data calon</h6>
        </div>

        <div class="card-body px-0 pt-0 pb-2">
          <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label class="form-control-label">Nama</label>
              <input
                type="text"
                class="form-control"
                name="Nama"
                value="<?= htmlspecialchars($calon['nama']) ?>"
              >
            </div>

            <div class="form-group">
              <label class="form-control-label">email</label>
              <input
                type="text"
                class="form-control"
                name="email"
                value="<?= htmlspecialchars($calon['email']) ?>"
              >
            </div>

            <div class="form-group">
              <label class="form-control-label">visi</label>
              <input
                type="text"
                class="form-control"
                name="visi"
                value="<?= htmlspecialchars($calon['visi']) ?>"
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
                value="<?= htmlspecialchars($calon['foto']) ?>"
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
