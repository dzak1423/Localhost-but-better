<?php
include "../Header/Header.php";
include "../Header/config.php";

$current_page = basename ($_SERVER['PHP_SELF']);

//$current_page = admin.php


//$_SERVER['PHP_SELF']Ini adalah variabel bawaan PHP yang berisi alamat file yang sedang dibuka
// basename() adalah fungsi PHP untuk mengambil nama file saka dari asebuah path.
// Ambil alamat file sekarang > ambil nama filenya saja.
?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <a class="btn btn-primary mg-2" href="tambah_admin.php">Tambah admin</a>
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NAMA DAN USERNAME</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EDIT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php
                        $No = 1;
                        $query = mysqli_query($koneksi, "select * FROM tbl_admin");
                        foreach ($query as $data):
                        ?>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <?= $No++ ?>
                          </div>
                        </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../../asset.siswa/img<?= $data['foto'] ?>"
                            class="avatar avatar-md me-3 cirle"
                            style="object-ft: cover;" alt="user">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h5 class="mb-0 text-sm"><?= $data['nama'] ?></h5>
                            <p class="text-zs text-secondary mb-0"><?= $data['username'] ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                          <a href="edit_admin.php?id=<?= $data['id_admin']; ?>"
                          class="btn btn-primary"
                          data-toggle="tooltip"
                          data-original-title="Edit admin">
                              Edit                          
                        </a>
                          <a href="delete_admin.php?id=<?= $data['id_admin']; ?>"
                          class="btn btn-danger"
                          data-toggle="tooltip"
                          data-original-title="Delete admin">
                              Delete
                        </td>
                        </a>
                        </div>
                    </tr>
<?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>

</html>