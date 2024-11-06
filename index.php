<?php 

session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Pagination
// Konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari ditekan
if( isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-3">
        <h1 align="center" class="mb-4">Data Mahasiswa</h1>
    <div class="row">
        <div class="col">
            <a href="tambah.php" class="btn btn-success btn-md">+ Tambah Data</a>
        </div>
        <div class="col">
            <form action="" method="POST" class="d-flex" role="search">
                <input class="form-control me-2" type="text" id="keyword" name="keyword" placeholder="Masukkan keyword pencarian" aria-label="Search" autofocus>
                <button class="btn btn-outline-success me-4" id="cari" name="cari" type="submit">Search</button>
                <a href="logout.php" class="btn btn-danger btn-md">logout</a>
            </form>
        </div>
      </div>
    </div>
    <div id="content" class="container border mt-3">
        <table class="table table-striped mt-3">
            <thead class="table-dark" align="center">
                <th>No</th>
                <th>Gambar</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </thead>
            <tbody align="center">

            <?php $i =1; ?>
            <?php foreach ( $mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><img src="img/<?= $mhs["gambar"]; ?>" width="50px" alt=""></td>
                    <td><?= $mhs["nim"]; ?></td>
                    <td><?= $mhs["nama"]; ?></td>
                    <td><?= $mhs["email"]; ?></td>
                    <td><?= $mhs["jurusan"]; ?></td>
                    <td>
                        <a class="btn btn-warning" href="ubah.php?id=<?= $mhs["id"]; ?>">
                            <span class="material-icons"><img src="img/edit.png" alt="edit"></span></a>
                        <a class="btn btn-danger" href="hapus.php?id=<?= $mhs["id"]; ?>" 
                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?')">
                            <span class="material-icons"><img src="img/delete.png" alt="delete"></span></a>
                    </td>   
                </tr>
            <?php $i++; ?>
            <?php endforeach; ?>

            </tbody>
        </table>
        <!-- Navigasi Pagination -->
        <?php if($halamanAktif > 1): ?>
            <a href="?page=<?= $halamanAktif - 1; ?>">&laquo;</a>
        <?php else: ?>
        <?php endif; ?>


         <?php for( $i= 1; $i <=$jumlahHalaman; $i++ ) : ?>
            <?php if($i == $halamanAktif) : ?>
                <a href="?page=<?= $i; ?>" style="color : red;"><?= $i; ?></a>
            <?php else : ?>
                <a href="?page=<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
         <?php endfor; ?>
        
        <?php if($halamanAktif < $jumlahHalaman): ?>
            <a href="?page=<?= $halamanAktif + 1; ?>">&raquo;</a>
        <?php else: ?>
        <?php endif; ?>
    </div>

    <script src="js/script.js"></script>
</body>
</html>