<?php 
require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' ";
$mahasiswa = query($query);


?>

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