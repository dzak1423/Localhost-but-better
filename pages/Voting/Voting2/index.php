<?php


session_start();

if (!isset($_SESSION['login']) || !$_SESSION['login']) {
  header("Location: ../login.php");
  exit;
}

include "../../Header/config.php"; 
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - QuickStart Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="../../../assets.yes/img/favicon.png" rel="icon">
  <link href="../../../assets.yes/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../assets.yes/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets.yes/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../assets.yes/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../../assets.yes/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../../assets.yes/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../../../assets.yes/css/main.css" rel="stylesheet">
</head>


<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <img src="../../../assets.yes/img/logo.png" alt="">
        <h1 class="sitename">VoteGo</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.php">
        <?= $_SESSION['nama']?>
      </a>

      <a href="../login.php"
      onclick="return confirm('Yakin mau logout?')"
      class="btn btn-danger"
      style="font-size: 14px; padding: 8px 25px; margin: 0 0 0 10px; border-radius: 50px; transition: 0.3s;"> 
      Logout
      </a>

    </div>
  </header>


  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="../../../assets.yes/img/hero-bg-light.webp" alt="">
      </div>

      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Voting Calon <span>Ketua Osis</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Klik Sekarang, Temukan Masa Depan!<br></p>

        <form action="../proses_vote.php" method="POST" id="formVote">

          <input type="hidden" name="id_calon" id="id_calon" >

          <div class="container py-4">
            <div class="row justify-content-center g-4">

              <?php
              $No = 1; $query = mysqli_query($koneksi, "select * FROM tbl_calon"); foreach ($query as $data):
              ?>
              <div class="col-md-4">
                <div class="card calon-card text-center shadow" onclick="pilihCalon(<?= $data ['id_calon'] ?>., this)">
                  <!--  Kalau tombol ini diklik, jalankan fungsi pilihcalon sambil kirim data id calon ini
                    onclick="pilihcalon(5, this)"
                    This : tombol yang sedang diklik  -->
                  <!-- CARD YPOOOOOOOOO WATCHAWASA -->

                  <span class="badge bg-primary position-absolute top-0 start-0 m-2 fs-3 px-3 py-2">
                    <?= sprintf("%02d", $No++) ?>
                  </span>

                  <img src="../../../asset.siswa/img<?= $data['foto'] ?>" class="card-img-top" style="height:400px; object-fit:cover;">
                  <div class="card-body">
                    <p class="card-text"><?= $data['nama'] ?></p>
                    <p class="card-text"><?= $data['visi'] ?></p>
                  </div>
                  <!-- END CARD YOOASDUKABLYAT -->
                </div>
              </div>
              <?php endforeach; ?>

            </div>
            <div class="text-center mt-4">
              <button 
              type="submit"
              class="btn btn-lg btn-primary px-5"
              id="btnPilih">PILIH
            </button>
            </div>
          </div>
          <div class="card">
          </div>
        </form>
          
          <img src="../../../assets.yes/img/hero-services-img.webp" class="opacity-0" style="width:10%">
        </div>
      </div>
      

    </section><!-- /Hero Section -->
  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <footer id="footer" class="footer position-relative light-background">

  <div class="container footer-top">
  <div class="row gy-4">
    <div class="col-lg-4 col-md-6 footer-about">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="sitename">QuickStart</span>
      </a>
      <div class="footer-contact pt-3">
        <p>A108 Adam Street</p>
        <p>New York, NY 535022</p>
        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
        <p><strong>Email:</strong> <span>info@example.com</span></p>
      </div>
      <div class="social-links d-flex mt-4">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4>Useful Links</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Terms of service</a></li>
        <li><a href="#">Privacy policy</a></li>
      </ul>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4>Our Services</h4>
      <ul>
        <li><a href="#">Web Design</a></li>
        <li><a href="#">Web Development</a></li>
        <li><a href="#">Product Management</a></li>
        <li><a href="#">Marketing</a></li>
        <li><a href="#">Graphic Design</a></li>
      </ul>
    </div>

    <div class="col-lg-4 col-md-12 footer-newsletter">
      <h4>Our Newsletter</h4>
      <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
      <form action="forms/newsletter.php" method="post" class="php-email-form">
        <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
      </form>
    </div>

  </div>
  </div>

<div class="container copyright text-center mt-4">
  <p>© <span>Copyright</span> <strong class="px-1 sitename">QuickStart</strong><span>All Rights Reserved</span></p>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you've purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Dist<a href="https://themewagon.com">ThemeWagon
  </div>
</div>

</footer>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../../../assets.yes/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets.yes/vendor/php-email-form/validate.js"></script>
  <script src="../../../assets.yes/vendor/aos/aos.js"></script>
  <script src="../../../assets.yes/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../../assets.yes/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../../../assets.yes/js/main.js"></script>

  <script>
    // buat fungwsi bernama pilihcalon yang menerima 2 data.
    function pilihCalon(id, card) {
      
      // isi hidden input
      // kode ini buat menyimpan nomor calon yang kita klik, supaya nanti bisa dikirim ke database
      document.getElementById("id_calon").value = id;

      // aqktifkan tombol nya ya ges
      document.getElementById('btnPilih').disable = false;

      // ambil semua elkement yang punya nama class calon-card lalu simoan dalam var semua_card
      let semua_card = document.querySelectorAll(".calon-card");

      // reset semua tanda di card\\
      semua_card.forEach(kartu_satuan => {
        kartu_satuan.classList.remove("border-info", "border-3");
      });

      // beri tanda yang dipilih
      card.classList.add("border-info", "border-3");
    };
  </script>

</body>
</html>