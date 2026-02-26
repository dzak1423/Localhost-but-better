<?php
include "../Header/config.php";
$berhasil = false;
$gagal = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $nama    = $_POST['nama'] ?? '';
    $no_hp   = $_POST['no_hp'] ?? '';
    $instansi = $_POST['instansi'] ?? '';
    $keperluan = $_POST['keperluan'] ?? '';
    $bertemu  = $_POST['bertemu'] ?? '';
    $tanggal = $_POST['tanggal'] ?? '';
    $jam = $_POST['jam'] ?? '';

    // Removed id from INSERT columns + values (AUTO_INCREMENT)
    // Added keperluan to VALUES
    $query = "INSERT INTO tamu (nama, no_hp, instansi, keperluan, bertemu, tanggal, jam) 
              VALUES ('$nama', '$no_hp', '$instansi', '$keperluan', '$bertemu', '$tanggal', '$jam')";

    if ($query) {
        $berhasil = true;
    } else {
        $gagal = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Buku Tamu</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>

<style>
    body {
    background: linear-gradient(135deg, #1937B8 0%, #0d1f4a 50%, #331f00 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: system-ui, -apple-system, sans-serif;
    padding: 1.5rem 0.75rem;
    background-attachment: fixed;
     }
  
    .form-card {
      backdrop-filter: blur(18px) saturate(180%);
      background: linear-gradient(145deg, rgba(25, 55, 184, 0.20), rgba(25, 55, 184, 0.10));
      border: 1px solid rgba(255, 169, 2, 0.25);
      border-radius: 1.5rem;
      box-shadow: 0 10px 35px rgba(25, 55, 184, 0.35), inset 0 1px 1px rgba(255,255,255,0.07);
      max-width: 480px;
      width: 100%;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }

    .form-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 55px rgba(255, 169, 2, 0.3);
    }

    .form-floating > label {
      color: rgba(255, 255, 255, 0.85);
      font-size: 0.9rem;
      font-weight: 500;
    }

    .form-control {
      background: rgba(255, 255, 255, 0.07);
      border: 1px solid rgba(255, 169, 2, 0.28);
      color: white;
      border-radius: 0.85rem;
      padding: 1.1rem 0.9rem 0.6rem;
      font-size: 0.95rem;
      box-shadow: inset 0 1.5px 6px rgba(0,0,0,0.12);
      transition: all 0.25s ease;
    }

    .form-control:focus {
      background: rgba(255, 255, 255, 0.13);
      border-color: #FFA902;
      box-shadow: 0 0 0 0.25rem rgba(255, 169, 2, 0.28), inset 0 1.5px 6px rgba(0,0,0,0.1);
    }

    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.45);
      font-size: 0.9rem;
    }

    .btn-submit {
      background: linear-gradient(90deg, #1937B8, #FFA902);
      border: none;
      border-radius: 0.85rem;
      padding: 0.75rem;
      font-weight: 600;
      font-size: 1rem;
      transition: all 0.35s ease;
    }

    .btn-submit:hover {
      transform: scale(1.04) translateY(-3px);
      box-shadow: 0 12px 30px rgba(255, 169, 2, 0.45);
      background: linear-gradient(90deg, #FFA902, #1937B8);
      filter: brightness(1.12);
    }

    h2 {
      font-weight: 800;
      font-size: 2rem;
      letter-spacing: -0.8px;
      background: linear-gradient(90deg, #FFA902, #ffffff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 0.5rem;
    }

    .text-muted {
      color: rgba(255, 255, 255, 0.75) !important;
      font-size: 0.9rem;
    }

    .form-check-input:checked {
      background-color: #FFA902;
      border-color: #FFA902;
    }

    .form-label.text-white {
      font-size: 0.9rem;
      font-weight: 500;
    }
</style>

</head>
<body>

  <div class="form-card p-4 m-2">
    <div class="text-center mb-4">
      <h2>Registrasi</h2>
      <p class="text-muted">Isi data kunjungan</p>
    </div>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label text-white">ID Tamu (Otomatis)</label>
        <input type="number" class="form-control" placeholder="ID Tamu" name="id">
      </div>

      <div class="row g-3">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama Lengkap" required>
            <label for="nama">nama Lengkap</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-floating">
            <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="" required>
            <label for="no_hp">Nomor HP</label>
          </div>
        </div>

        <div class="col-12">
          <div class="form-floating">
            <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi / Perusahaan" required>
            <label for="instansi">Instansi</label>
          </div>
        </div>

        <div class="col-12">
          <div class="form-floating">
            <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Contoh: Rapat dengan Pak Budi" required>
            <label for="keperluan">Keperluan Kunjungan</label>
          </div>
        </div>

        <div class="col-12">
          <div class="form-floating">
            <input type="text" class="form-control" id="bertemu" name="bertemu" placeholder="nama & Jabatan" required>
            <label for="bertemu">Bertemu</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-floating">
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            <label for="tanggal">Tanggal</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-floating">
              <input type="time" class="form-control" id="jam" name="jam" required>
            <label for="jam">Jam</label>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="konfirmasi" required>
          <label class="form-check-label text-muted small" for="konfirmasi">Data sudah benar?</label>
        </div>
      </div>

      <button type="submit" class="btn btn-submit w-100">Daftar Tamu</button>

      <div class="text-center mt-4">
        <p class="text-muted small">Terima kasih • Dzak, 2026</p>
      </div>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $nama    = $_POST['nama'] ?? '';
            $no_hp   = $_POST['no_hp'] ?? '';
            $instansi = $_POST['instansi'] ?? '';
            $bertamu  = $_POST['bertemu'] ?? '';
            $tanggal = $_POST['tanggal'] ?? '';
            $jam = $_POST['jam'] ?? '';
        
            $query =
            "INSERT INTO tamu (nama, no_hp, instansi, keperluan, bertemu, tanggal, jam) 
            VALUES ('$nama', '$no_hp', '$instansi', '$keperluan', '$bertamu', '$tanggal', '$jam')";
            mysqli_query($koneksi, $query);
        }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <?php if($berhasil){ ?>
      <script>
          Swal.fire({
          title: "Berhasil!",
          text: "Data berhasil disimpan",
          icon: "success",
          ShowConfirmaButton : false,
          timer: 2500 
          }).then(() => {
              window.location.href = "Index/index.php";
          })
          ;
      </script>
  <?php } ?>
  <?php if($gagal){ ?>
      <script>
        Swal.fire({
          icon: "error",
          title: "Error!",
          text: "Coba lagi",
          ShowConfirmaButton : false,
          timer: 2500 
          }).then(() => {
              window.location.href = "Index/index.php";
          })
          ;
      </script>
  <?php } ?>

</body>
</html>