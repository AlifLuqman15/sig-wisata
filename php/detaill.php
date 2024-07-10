<?php
// mengecek apakah ada id yang dikirimkan
// jika tidak maka akan dikembalikan ke halaman index.php
if (!isset($_GET['Id'])) {
    header("Location: ../indeks.php");
    exit;
}
require '../php/functions.php';

// mengambil id dari url 
$Id = $_GET['Id'];


//melakukan query dengan parameter id yang diambil dari url
$mapp = query("SELECT * FROM maps WHERE Id = $Id")[0];

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
    <link rel="stylesheet" href="../css/cssdetail.css">
    <title>Website Pariwisata Indramayu</title>
    <link rel="shortcut icon" href="../assets/logo/Indramayu.png" type="image/x-icon">

</head>

<body>
    <div class="container">
        <div class="gambar">
            <img src="../assets/pict/<?= $mapp["Gambar"]; ?>" alt="" width="250">
        </div>
        <div class="keterangan">
            <table>
                <tr>
                    <th>Nama : <?= $mapp["Nama"]; ?></th>
                    <th>Deskrpisi : <?= $mapp["Deskripsi"]; ?></th>
                    <th>Longitude : <?= $mapp["Longitude"]; ?></th>
                    <th>Latitude : <?= $mapp["Latitude"]; ?></th>
                    <th>Jumlah Desa : <?= $mapp["Desa"]; ?></th>
                </tr>
            </table>
        </div><br>
        <a href="admin.php" class="waves-effect waves-light blue lighten-2 btn small">Kembali</a>
    </div>
</body>

</html>