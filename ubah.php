<?php 

session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Ambil data di URL
$id = $_GET["id"];

// Query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//  cek apakah tombol submit sudah di klik atau belum
if( isset($_POST["submit"]) ) {
    // cek apakah data berhasil diubah apa tidak
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Gagal Diubah!');
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
    <title>Ubah Data</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
</head>
<body>
    <h2 align="center" class="mt-5 mb-4">Form Ubah Mahasiswa </h2>
    <div class="w-50 mx-auto border p-3">
        <form action="" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">

            <div class="form-group row mb-3">
                <label for="gambar" class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-9">
                <img src="img/<?= $mhs["gambar"]; ?>" width="50px" alt="">
                <input type="file" class="form-control" name="gambar" id="gambar"></div>
            </div>

            <div class="form-group row mb-3">
                <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>"></div>
            </div>

            <div class="form-group row mb-3">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $mhs["nama"]; ?>"></div>
            </div>
            
            <div class="form-group row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="email" id="email" value="<?= $mhs["email"]; ?>"></div>
            </div>

            <div class="form-group row mb-3">
                <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>"></div>
            </div>

            <a href="index.php" class="btn btn-danger btn-md mt-3">Kembali</a>
            <button class="btn btn-success mt-3" name="submit" type="submit">Simpan</button>
        </form>  
    </div>
</body>
</html>