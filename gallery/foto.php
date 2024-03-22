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
    <title>Foto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Foto</h1>
        <p>Welcome <b><?=$_SESSION['namalengkap']?></b></p>

        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">ALBUM</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">FOTO</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
        </ul>

        <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judulfoto">Judul</label>
                <input type="text" class="form-control" id="judulfoto" name="judulfoto">
            </div>
            <div class="form-group">
                <label for="deskripsifoto">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsifoto" name="deskripsifoto">
            </div>
            <div class="form-group">
                <label for="lokasifile">Lokasi File</label>
                <input type="file" class="form-control-file" id="lokasifile" name="lokasifile">
            </div>
            <div class="form-group">
                <label for="albumid">Album</label>
                <select class="form-control" id="albumid" name="albumid">
                    <?php
                    include "koneksi.php";
                    $userid=$_SESSION['userid'];
                    $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                    while($data=mysqli_fetch_array($sql)){
                    ?>
                       <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Unggah</th>
                    <th>Lokasi File</th>
                    <th>Album</th>
                    <th>Disukai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "koneksi.php";
                $userid=$_SESSION['userid'];
                $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
                while($data=mysqli_fetch_array($sql)){
                ?>
                        <tr>
                            <td><?=$data['fotoid']?></td>
                            <td><?=$data['judulfoto']?></td>
                            <td><?=$data['deskripsifoto']?></td>
                            <td><?=$data['tanggalunggah']?></td>
                            <td>
                                <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                            </td>
                            <td><?=$data['namaalbum']?></td>
                            <td>
                            <?php
                                $fotoid=$data['fotoid'];
                                $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                                echo mysqli_num_rows($sql2);
                            ?>
                            </td>
                            <td>        
                                <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>" class="btn btn-danger btn-sm">Hapus</a>
                                <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>" class="btn btn-primary btn-sm">Edit</a>
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
