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
// menghubungkan dengan file php lainnya
require 'functions.php';

// melakukan query
$maps = query("SELECT * FROM maps");

// jika tombol di klik
if (isset($_GET["cari"])) {
    $maps = cari($_GET["keyword"]);
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
    <link rel="stylesheet" href="../css/cssadmin.css">
    <title>Website Pariwisata Indramayu</title>
    <link rel="shortcut icon" href="../assets/logo/Indramayu.png" type="image/x-icon">
</head>

<body>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script></script>
    <div class="container">
        <h4 class="centered black-text">Pariwisata Indramayu</h4>
        <div class="add">
            <a href="tambah.php" class="waves-effect waves-light cyan btn-small">Tambah Data</a>
            <form action="" method="GET">
                <input class="black-text" type="text" name="keyword" autofocus placeholder="masukkan keyword.." autocomplete="off">
                <button class="waves-effect waves-light cyan btn-small" type="submit" name="cari">Search</button>
                <br><br>
            </form>
        </div>
        <table class="centered highlight - black-text transparent">
            <tr class="cyan lighten-4 black-text">
                <th>No</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Detail</th>
                <th>Opsi</th>
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
                                <a href="../php/detaill.php?Id=<?= $mapp['Id']; ?>">Lihat Detail</a>
                        </td>
                        <td>
                            <a href="ubah.php?Id=<?= $mapp['Id'] ?>" class="waves-effect waves-light teal btn-small">Ubah</a>
                            <a href="hapus.php?Id=<?= $mapp['Id'] ?>" onclick="return confirm('Apakah anda yakin??');" class="waves-effect waves-light pink darken-3 btn-small">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="logout">
                <a href="logout.php" class="waves-effect waves-light pink btn-small">Logout</a>
                <br><br>
            </div>
    </div>
</body>

</html>