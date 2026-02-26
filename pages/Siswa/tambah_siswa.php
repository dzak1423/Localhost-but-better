<?php
include "../Header/Header.php";
include "../Header/config.php";
$berhasil = false;

$current_page = basename ($_SERVER['PHP_SELF']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nama    = $_POST['Nama'];
    $Kelas   = $_POST['Kelas'];
    $Jurusan = $_POST['Jurusan'];
    $Alamat  = $_POST['Alamat'];
    $Password = $_POST['Password'];

    $query = mysqli_query(
        $koneksi,
        "INSERT INTO tbl_siswa (nama, kelas, jurusan, alamat, password) VALUES ('$Nama', '$Kelas', '$Jurusan', '$Alamat', '$Password)"
    );

    if ($query) {
        $berhasil = true;
    }
}
    ?>


<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Data Siswa</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <form method="POST">
                <div class="form-group">
                    <label for="Nama" class="form-control-label">Nama</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" id="Nama" placeholder="Input Nama" name="Nama">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Kelas" class="form-control-label">Kelas</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" id="Kelas" placeholder="Input Kelas" name="Kelas">
                    </div>  
                </div>    <div class="form-group">
                    <label for="Jurusan" class="form-control-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" id="Jurusan" placeholder="Input Jurusan" name="Jurusan">
                    </div>
                </div>    <div class="form-group">
                    <label for="Alamat" class="form-control-label">Alamat</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" id="Alamat" placeholder="Input Alamat" name="Alamat">
                    </div>
                </div>
                </div>    <div class="form-group">
                    <label for="Alamat" class="form-control-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" id="Password" placeholder="Input Password" name="Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $Nama = $_POST['Nama'];
                $Kelas = $_POST['Kelas'];
                $Jurusan = $_POST['Jurusan'];
                $Alamat = $_POST['Alamat'];
                $Password = $_POST['Password'];

                $query = 
                "INSERT INTO tbl_siswa(nama, kelas, jurusan, alamat, password)
                VALUES ('$Nama', '$Kelas', '$Jurusan', '$Alamat', '$Password)";
            }

            ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php if($berhasil){ ?>
    <script>
        Swal.fire({
        title: "Berhasil!",
        text: "Data berhasil disimpan",
        icon: "success",
        ShowConfirmaButton : false,
        timer: 2500 
        }).then(() => {
            window.location.href = "siswa.php";
        })
        ;
    </script>
<?php } ?>