<?php
require 'php/functions.php';
$maps = query("SELECT * FROM maps");

// jika tombol di klik
if (isset($_GET["cari"])) {
  $maps = cari($_GET["keyword"]);
}
?>

<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <!--Let browser know website is optimized for mobile-->
  <link rel="stylesheet" href="css/wisata.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<title>Peta Wisata Kabupaten Indramayu</title>
<link rel="shortcut icon" href="assets/Indramayu.png" type="image/x-icon">

<body id="home" class="scrollspy">

  <div class="navbar-fixed">
    <nav class="blue-grey lighten-4">
      <div class="container">
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo black-text"><img src="assets/Indramayu.png" alt="" width="55"></i></a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="index.php" class="waves-effect waves-light light-blue darken-3 btn-small">Home</a></li>
            <li><a href="php/maps.php" class="waves-effect waves-light light-blue darken-3 btn-small">Peta</a></li>
            <li><a href="php/lihat.php" class="waves-effect waves-light light-blue darken-3 btn-small">Lihat Data</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-nav">
            <li><a href="index.php" class="waves-effect waves-light blue btn-small">Home</a></li>
            <li><a href="php/maps.php" class="waves-effect waves-light blue btn-small">Peta</a></li>
            <li><a href="php/lihat.php" class="waves-effect waves-light blue btn-small">Lihat Data</a></li>
  </ul>

  <!-- sliders -->
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="assets/Background.png">
        <div class="caption right">
          <h5 class="light white-text text-lighten-3">Selamat Datang di</h5>
          <p>Website Sistem Informasi Geografis</p>
          <h3 class="light white-text text-lighten-3">Kabupaten Indramayu</h3>
          <p class="light white-text text-lighten-3">Website ini dibuat untuk meningkatkan potensi dan melakukan promosi wisata-wisata yang ada di Kabupaten Indramayu.</p>
          <a href="#Wisata" class="btn-small waves-effect waves-light orange">Lihat Detail</a>
        </div>
      </li>
    </ul>
  </div>

  <section id="Wisata" class="Wisata scrollspy">
    <div class="container">
    <h3 class="center light black-text">Daftar Wisata</h3><br>
      <div class="row"><br><br>
        <!-- <form action="" method="GET">
          <input class="black-text" type="text" name="keyword" placeholder="masukkan keyword.." autocomplete="off" id="keyword">
          <button class="waves-effect waves-light teal btn-small" type="submit" name="cari" id="tombol-carii">Search</button>
          <br><br>
        </form> -->
        <div id="container">
          <?php if (empty($maps)) : ?>
            <tr>
              <td colspan="7">
                <h1>Data tidak ditemukan</h1>
              </td>
            </tr>
          <?php else : ?>
            <?php $i = 1; ?>
            <?php foreach ($maps as $mapp) : ?>
              <div class="col m3 s12">
                <div class="card-small">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="assets/pict/<?= $mapp["Gambar"]; ?>">
                  </div>
                  <div class="card-content">
                    <span class="card-tittle activator black-text"><?= $mapp["Nama"]; ?><i class="material-icons right">more_vert</i></span>
                    <p>
                      <a href="php/detaill.php?Id=<?= $mapp['Id']; ?>">Detail Wisata</a>
                    </p>
                  </div>
                </div>
              </div>
              <?php $i++; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    </div>
    </section>   
  

  <!-- footer -->
  <section class="footer">
    <div class="container">
      <div class="sec aboutus">
        <h3>About Us</h3>
        <p>Kabupaten Indramayu adalah sebuah kabupaten di Provinsi Jawa Barat, Indonesia. Kabupaten ini berbatasan dengan
        Laut Jawa di utara, dimana Kabupaten Indramayu terdiri atas 31 kecamatan, yang dibagi lagi atas
        sejumlah 313 desa dan kelurahan, yang memiliki beraneka ragam obyek wisata baik jenis, bentuk, maupun ciri keunikan tradisional daerah.</p>
        <ul class="sci">
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>

      <div class="sec quickLinks">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="#">About</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Help</a></li>
          <li><a href="#">Terms & Consitions</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>

      <div class="sec contact1">
        <h3>Contact Info</h3>
        <ul class="info">
          <li>
            <span><i class="fa fa-map-marker-alt"></i></span>
            <span><a href="https://goo.gl/maps/N5dxUJd5EK26eZ1V9">Bandung, Indonesia<br></a></span>
          </li>

          <li>
            <span><i class="fa fa-phone"></i></span>
            <span><a href="tel:081297864387">+62 812 9786 4387</a>
            </span>
          </li>

          <li>
            <span><i class="fa fa-envelope"></i></span>
            <span><a href="mailto:alifluqman994@gmail.com">alifluqman994@gmail.com</a><br>
            </span>
          </li>
        </ul>
      </div>

    </div>
  </section>

  <div class="copy">
    <p>Copyright &copy; 2024 AlifLuqman. All Rights Reserved</p>
  </div>




  <!--JavaScript at end of body for optimized loading-->
  <script src="js/scriptt.js"></script>
  <script src="https://kit.fontawesome.com/7a30603574.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    const sideNav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sideNav);

    const slider = document.querySelectorAll('.slider');
    M.Slider.init(slider, {
      indicators: false,
      height: 905,
      transition: 600,
      interval: 4000
    });

    const parallax = document.querySelectorAll('.parallax');
    M.Parallax.init(parallax);

    const materialbox = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(materialbox);

    const scroll = document.querySelectorAll('.scrollspy');
    M.ScrollSpy.init(scroll, {
      scrollOffset: 25
    });
  </script>
</body>

</html>