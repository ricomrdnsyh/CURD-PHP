<?php 

session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//  cek apakah tombol submit sudah di klik atau belum
if( isset($_POST["submit"]) ) {

    // cek apakah data berhasil ditambahkan apa tidak
    if( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
</head>
<body>
    <h2 align="center" class="mt-5 mb-4">Form Tambah Mahasiswa </h2>
    <div class="w-50 mx-auto border p-3">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row mb-3">
                <label for="gambar" class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-9">
                <input type="file" class="form-control" name="gambar" id="gambar"></div>
            </div>

            <div class="form-group row mb-3">
                <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="nim" id="nim" required></div>
            </div>

            <div class="form-group row mb-3">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" id="nama" required></div>
            </div>
            
            <div class="form-group row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="email" id="email" required></div>
            </div>

            <div class="form-group row mb-3">
                <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="jurusan" id="jurusan" required></div>
            </div>

            <a href="index.php" class="btn btn-danger btn-md mt-3">Kembali</a>
            <a href="tambah.php" class="btn btn-warning btn-md mt-3">Ulangi</a>
            <button class="btn btn-success mt-3" name="submit" type="submit">Tambah Data</button>
        </form>  
    </div>
</body>
</html>