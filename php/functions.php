<?php
/*
Alif Luqman Hakim
203040046
Shift Jumat 10.00 - 11.00
Informatika-B
*/

// fungsi untuk melakukan koneksi database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "gis_diskominfo_indramayu");

    return $conn;
}

// function untuk melakukan query dan memasukkannya ke dalam array
function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function upload()
{
    $nama_file = $_FILES['Gambar']['name'];
    $tipe_file = $_FILES['Gambar']['type'];
    $ukuran_file = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmp_file = $_FILES['Gambar']['tmp_name'];

    if ($error == 4) {
        // echo "<script>
        //         alert('Pilih gambar terlebih dahulu!');
        //         </script>";
        return 'nophoto.jpg';
    }

    // cek ekstensi file
    $daftar_Gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $daftar_Gambar)) {
        echo "<script>
                alert('Yang anda pilih bukan gambar!');
                </script>";
        return false;
    }

    // cek tipe file
    if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
        echo "<script>
                alert('Yang anda pilih bukan gambar!');
                </script>";
        return false;
    }

    // cek ukuran file
    // maksimal 5Mb == 5000000
    if ($ukuran_file > 5000000) {
        echo "<script>
                alert('Ukuran file terlalu besar!');
                </script>";
        return false;
    }

    // lolos pengecekan
    // siap upload file
    // generate nama file baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, '../assets/pict/' . $nama_file_baru);

    return $nama_file_baru;
}

// fungsi untuk menambahkan data didalam database
function tambah($data)
{
    $conn = koneksi();

    $Nama = htmlspecialchars($data['Nama']);
    $Longitude = htmlspecialchars($data['Longitude']);
    $Latitude = htmlspecialchars($data['Latitude']);
    $Deskripsi = htmlspecialchars($data['Deskripsi']);
    $Desa = htmlspecialchars($data['Desa']);
    // $Gambar = htmlspecialchars($data['Gambar']);

    $Gambar = upload();
    if (!$Gambar) {
        return false;
    }

    $query = "INSERT INTO maps
                            VALUES
                            ('', '$Nama', '$Longitude', '$Latitude', '$Deskripsi', '$Desa', '$Gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus($Id)
{
    $conn = koneksi();


    $mapp = query("SELECT * FROM maps WHERE Id = $Id")[0];
    if ($mapp['Gambar'] != 'nophoto.jpg') {
        unlink('../assets/pict/' . $mapp['Gambar']);
    }

    mysqli_query($conn, "DELETE FROM maps WHERE Id = $Id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    $conn = koneksi();
    $Id = ($data['Id']);
    $Nama = htmlspecialchars($data['Nama']);
    $Deskripsi = htmlspecialchars($data['Deskripsi']);
    $Longitude = htmlspecialchars($data['Longitude']);
    $Latitude = htmlspecialchars($data['Latitude']);
    $Desa = htmlspecialchars($data['Desa']);
    $Gambar_lama = htmlspecialchars($data['Gambar_lama']);

    $Gambar = upload();
    if (!$Gambar) {
        return false;
    }

    if ($Gambar == 'nophoto.jpg') {
        $Gambar = $Gambar_lama;
    }

    $query = "UPDATE maps SET
    Nama = '$Nama',
    Deskripsi = '$Deskripsi',
    Longitude = '$Longitude',
    Latitude = '$Latitude',
    Desa = '$Desa',
    Gambar = '$Gambar'
    WHERE Id = $Id
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM maps
    WHERE
    Nama LIKE '%$keyword%' OR
    Deskripsi LIKE '%$keyword%' OR
    Longitude LIKE '%$keyword%' OR
    Latitude LIKE '%$keyword%' OR
    Desa LIKE '%$keyword%'
    ";
    return query($query);
}