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

$Id = $_GET['Id'];
$mapp = query("SELECT * FROM maps WHERE Id = $Id")[0];

if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                        alert('Data Berhasil diubah!');
                        document.location.href = 'admin.php';
                    </script>";
    } else {
        echo "<script>
            alert('Data Gagal diubah!');
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
        <h4 class="black-text">Ubah Data</h4>
        <form action="" method="post" enctype="multipart/form-data">

            <input type="hidden" name="Id" value="<?= $mapp['Id']; ?>">

            <div class="card-panel">
                <div class="input-field"><br>
                    <input type="text" name="Nama" id="Nama" required value="<?= $mapp['Nama']; ?>" class="validate">
                    <label for="Nama">Nama</label>
                </div>
                <div class="input-field"><br>
                    <input type="text" name="Longitude" id="Longitude" required value="<?= $mapp['Longitude']; ?>" class="validate">
                    <label for="Longitude">Longitude</label>
                </div>
                <div class="input-field"><br>
                    <input type="text" name="Latitude" id="Latitude" required value="<?= $mapp['Latitude']; ?>" class="validate">
                    <label for="Latitude">Latitude</label>
                </div>
                <div class="input-field"><br>
                    <input type="text" name="Deskripsi" id="Deskripsi" required value="<?= $mapp['Deskripsi']; ?>" class="validate">
                    <label for="Deskripsi">Deskripsi</label>
                </div>
                <div class="input-field"><br>
                    <input type="text" name="Desa" id="Desa" required value="<?= $mapp['Desa']; ?>" class="validate">
                    <label for="Desa">Jumlah Desa</label>
                </div>
                <div class="input-field">
                    <input type="hidden" name="Gambar_lama" value="<?= $mapp['Gambar']; ?>">
                    <label for="Gambar"></label>
                    <input type="file" name="Gambar" id="Gambar" class="gambar black-text" onchange="previewImage()">
                    <img src="../assets/pict/<?= $mapp['Gambar']; ?>" alt="" width="120" style="display: block;" class="img-preview">
                </div>

                <button type="submit" name="ubah" class="waves-effect waves-light red lighten-2 btn small">Ubah Data!</button>
                <a href="admin.php" class="waves-effect waves-light red lighten-2 btn small">Kembali</a>
            </div>
        </form>
    </div>
    <script src="../js/scriptt.js"></script>
    <script type="text/javascript" src="..js/materialize.min.js"></script>
</body>

</html>