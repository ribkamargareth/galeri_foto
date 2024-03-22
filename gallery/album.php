<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Album</h1>
        <p>Welcome <b><?=$_SESSION['namalengkap']?></b></p>

        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">ALBUM</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">FOTO</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
        </ul>

        <form action="tambah_album.php" method="post">
            <div class="form-group">
                <label for="namaalbum">Nama Album</label>
                <input type="text" class="form-control" id="namaalbum" name="namaalbum">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Tanggal dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "koneksi.php";
                $userid=$_SESSION['userid'];
                $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                while($data=mysqli_fetch_array($sql)){
                ?>
                        <tr>
                            <td><?=$data['albumid']?></td>
                            <td><?=$data['namaalbum']?></td>
                            <td><?=$data['deskripsi']?></td>
                            <td><?=$data['tanggaldibuat']?></td>
                            <td>
                                <a href="hapus_album.php?albumid=<?=$data['albumid']?>" class="btn btn-danger btn-sm">Hapus</a>
                                <a href="edit_album.php?albumid=<?=$data['albumid']?>" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
