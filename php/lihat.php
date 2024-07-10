<?php
require 'functions.php';
$maps = query("SELECT * FROM maps");

// jika tombol di klik
if (isset($_GET["cari"])) {
  $maps = cari($_GET["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <!--Let browser know website is optimized for mobile-->
  <link rel="stylesheet" href="../css/cssindexx.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Pariwisata Indramayu</title>
  <link rel="shortcut icon" href="../assets/Indramayu.png" type="image/x-icon">
</head>
<body>
<div class="navbar-fixed">
    <nav class="blue-grey lighten-4">
      <div class="container">
        <div class="nav-wrapper">
          <a href="../index.php" class="brand-logo black-text"><img src="../assets/Indramayu.png" alt="" width="55"></i></a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="../index.php" class="waves-effect waves-light light-blue darken-3 btn-small">Home</a></li>
            <li><a href="maps.php" class="waves-effect waves-light light-blue darken-3 btn-small">Peta</a></li>
            <li><a href="lihat.php" class="waves-effect waves-light light-blue darken-3 btn-small">Lihat Data</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-nav">
            <li><a href="../index.php" class="waves-effect waves-light blue btn-small">Home</a></li>
            <li><a href="maps.php" class="waves-effect waves-light blue btn-small">Peta</a></li>
            <li><a href="lihat.php" class="waves-effect waves-light blue btn-small">Lihat Data</a></li>
  </ul>

    <div class="container"><br>
    <h5 class="center black-text">Data Kecamatan Yang Ada Di Kabupaten Indramayu</h5>
      <div class="row"><br><br>
        <form action="" method="GET">
          <input class="black-text" type="text" name="keyword" placeholder="masukkan keyword.." autocomplete="off" id="keyword">
          <button class="waves-effect waves-light teal btn-small" type="submit" name="cari" id="tombol-carii">Search</button>
          <br><br>
        </form>
        <div id="container">          
          <table class="centered highlight - black-text transparent">
            <tr class="cyan lighten-4 black-text">
                <th class="center">No</th>
                <th class="center">Nama</th>
                <th class="center">Foto</th>
                <th class="center">Detail</th>
            </tr>
            <?php if (empty($maps)) : ?>
                <tr>
                    <td colspan="7">
                        <h1>Data tidak ditemukan</h1>
                    </td>
                </tr>
            <?php else : ?>
                <?php $i = 1 ?>
                <?php foreach ($maps as $mapp) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td class="black-text"><?= $mapp["Nama"]; ?></td>
                        <td><img src="../assets/pict/<?= $mapp["Gambar"]; ?>" alt=""></td>
                        <td>
                            <p class="Nama">
                                <a href="../php/detail.php?Id=<?= $mapp['Id']; ?>">Lihat Detail</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
      </div>
    </div>
    </div>
    
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