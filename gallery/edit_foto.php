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
    <title>Halaman Edit Foto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Halaman Edit Foto</h1>
        <p>Welcome <b><?=$_SESSION['namalengkap']?></b></p>

        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>

        <form action="update_foto.php" method="post" enctype="multipart/form-data">
            <?php
                include "koneksi.php";
                $fotoid=$_GET['fotoid'];
                $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
                while($data=mysqli_fetch_array($sql)){
            ?>
            <input type="hidden" name="fotoid" value="<?=$data['fotoid']?>">
            <div class="form-group">
                <label for="judulfoto">Judul</label>
                <input type="text" class="form-control" id="judulfoto" name="judulfoto" value="<?=$data['judulfoto']?>">
            </div>
            <div class="form-group">
                <label for="deskripsifoto">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsifoto" name="deskripsifoto" value="<?=$data['deskripsifoto']?>">
            </div>
            <div class="form-group">
                <label for="lokasifile">Lokasi File</label>
                <input type="file" class="form-control-file" id="lokasifile" name="lokasifile">
            </div>
            <div class="form-group">
                <label for="albumid">Album</label>
                <select class="form-control" id="albumid" name="albumid">
                    <?php
                    $userid=$_SESSION['userid'];
                    $sql2=mysqli_query($conn,"select * from album where userid='$userid'");
                    while($data2=mysqli_fetch_array($sql2)){
                    ?>
                       <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
            <?php
                }
            ?>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
