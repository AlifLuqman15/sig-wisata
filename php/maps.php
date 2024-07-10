<?php
require 'functions.php';
$maps = query("SELECT * FROM maps");

?>

<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <!--Let browser know website is optimized for mobile-->
  <link rel="stylesheet" href="../css/wisata.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<title>Peta Wisata Kabupaten Indramayu</title>
<link rel="shortcut icon" href="../assets/Indramayu.png" type="image/x-icon">

<body id="home" class="scrollspy">

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
          <li><a href="../index.php" class="waves-effect waves-light light-blue darken-3 btn-small">Home</a></li>
          <li><a href="maps.php" class="waves-effect waves-light light-blue darken-3 btn-small">Peta</a></li>
          <li><a href="lihat.php" class="waves-effect waves-light light-blue darken-3 btn-small">Lihat Data</a></li>
  </ul><br>
<div class="container">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
   integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
   crossorigin=""/>

   <style type="text/css">
    #map { height: 483px;}
   </style>
   <div id="map"></div>

   <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
   integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
   crossorigin=""></script>
   <script>

    // ikon marker
    var iconCamera = L.icon({iconUrl: "../assets/Marker.png", iconSize: [44, 44], iconAnchor: [22, 44], tooltipAnchor: [22, -20]});
    var map = L.map('map').setView([-6.344796345205669, 108.325618560382], 12);
 
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 13,
    attribution: '© OpenStreetMap'
    }).addTo(map);

    <?php foreach ($maps as $map) : ?>
    var <?php echo str_replace(' ', '_', $map['Nama']); ?> = L.marker([<?php echo $map['Latitude']; ?>, <?php echo $map['Longitude']; ?>], { icon: iconCamera }).addTo(map).bindTooltip("<?php echo $map['Nama']; ?>");
    <?php endforeach; ?>
    
   </script>
   </div><br>

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
  <script src="../js/scriptt.js"></script>
  <script src="https://kit.fontawesome.com/7a30603574.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script>
    const sideNav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sideNav);
  </script>
</body>

</html>