<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $asal_negara = $_POST['asal_negara'];
    $jumlah_karya = $_POST['jumlah_karya'];

    $stmt = $conn->prepare("INSERT INTO Penulis (nama, asal_negara, jumlah_karya) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $asal_negara, $jumlah_karya]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Tambah Penulis</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Tambah Penulis</h1>
        <form method="POST" class="mt-3">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="asal_negara" class="form-label">Asal Negara</label>
                <input type="text" class="form-control" id="asal_negara" name="asal_negara" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_karya" class="form-label">Jumlah Karya</label>
                <input type="number" class="form-control" id="jumlah_karya" name="jumlah_karya" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
