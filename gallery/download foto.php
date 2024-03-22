<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Foto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Download Foto</h1>
        <p>Welcome <b><?=$_SESSION['namalengkap']?></b></p>

        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">ALBUM</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">FOTO</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
        </ul>

        <div class="card mt-5">
            <div class="card-header">
                Foto Title
            </div>
            <div class="card-body">
                <img src="gambar/foto.jpg" class="img-fluid" alt="Foto">
            </div>
            <div class="card-footer">
                <a href="gambar/foto.jpg" download class="btn btn-primary">Download Foto</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
