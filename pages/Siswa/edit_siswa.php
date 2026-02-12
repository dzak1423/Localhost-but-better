<?php
include "../Header/config.php";
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: siswa.php");
    exit;
}
$query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id_siswa = '$id'");
$siswa = mysqli_fetch_assoc($query);


if (!$siswa) {
    header("Location: siswa.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nama    = $_POST['Nama'];
    $Kelas   = $_POST['Kelas'];
    $Jurusan = $_POST['Jurusan'];
    $Alamat  = $_POST['Alamat'];

    $update = mysqli_query($koneksi, "
        UPDATE tbl_siswa SET
            nama = '$Nama',
            kelas = '$Kelas',
            jurusan = '$Jurusan',
            alamat = '$Alamat'
        WHERE id_siswa = '$id'
    ");

    if ($update) {
        header("Location: siswa.php");
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
          <h6>Edit Data siswa</h6>
        </div>

        <div class="card-body px-0 pt-0 pb-2">
          <form method="POST">

            <div class="form-group">
              <label class="form-control-label">Nama</label>
              <input
                type="text"
                class="form-control"
                name="Nama"
                value="<?= htmlspecialchars($siswa['nama']) ?>"
              >
            </div>

            <div class="form-group">
              <label class="form-control-label">Kelas</label>
              <input
                type="text"
                class="form-control"
                name="Kelas"
                value="<?= htmlspecialchars($siswa['kelas']) ?>"
              >
            </div>

            <div class="form-group">
              <label class="form-control-label">Jurusan</label>
              <input
                type="text"
                class="form-control"
                name="Jurusan"
                value="<?= htmlspecialchars($siswa['jurusan']) ?>"
              >
            </div>

            <div class="form-group">
              <label class="form-control-label">Alamat</label>
              <input
                type="text"
                class="form-control"
                name="Alamat"
                value="<?= htmlspecialchars($siswa['alamat']) ?>"
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
