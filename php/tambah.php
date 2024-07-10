<?php
/*
Alif Luqman Hakim
203040046
Shift Jumat 10.00 - 11.00
Informatika-B
*/

session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
                        alert('Data Berhasil ditambahkan!');
                        document.location.href = 'admin.php';
                    </script>";
  } else {
    echo "<script>
            alert('Data Gagal ditambahkan!');
            document.location.href = 'admin.php';
            </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <!-- css style -->
  <link rel="stylesheet" href="../css/cssform.css">
  <title>Website Pariwisata Indramayu</title>
  <link rel="shortcut icon" href="../assets/logo/Indramayu.png" type="image/x-icon">

</head>

<body>
  <div class="container">
    <h3 class="black-text">Tambah Data</h3>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="card-panel">
        <div class="input-field"><br>
          <input type="text" name="Nama" id="Nama" autofocus required class="validate">
          <label for="Nama">Nama Tempat</label>
        </div>
        <div class="input-field"><br>
          <input type="text" name="Longitude" id="Longitude" required class="validate">
          <label for="Longitude">Longitude</label>
        </div>
        <div class="input-field"><br>
          <input type="text" name="Latitude" id="Latitude" required class="validate">
          <label for="Latitude">Latitude</label>
        </div>
        <div class="input-field"><br>
          <input type="text" name="Deskripsi" id="Deskripsi" required class="validate">
          <label for="Deskripsi">Deskripsi</label>
        </div>
        <div class="input-field"><br>
          <input type="text" name="Desa" id="Desa" required class="validate">
          <label for="Desa">Jumlah Desa</label>
        </div>
        <div class="input-field">
          <input type="file" name="Gambar" id="Gambar" class="gambar black-text" onchange="previewImage()">
          <label for="Gambar"></label>
          <img src="../assets/pict/nophoto.jpg" alt="" width="120" style="display: block;" class="img-preview">
        </div>
        <button type="submit" name="tambah" class="waves-effect waves-light red lighten-2 btn small">Tambah Data!</button>
        <a href="admin.php" class="waves-effect waves-light red lighten-2 btn small">Kembali</a>
      </div>
    </form>
  </div>
  <script src="../js/scriptt.js"></script>
  <script type="text/javascript" src="..js/materialize.min.js"></script>
</body>

</html>