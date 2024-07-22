<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Penulis WHERE id_penulis = ?");
    $stmt->execute([$id]);
    $penulis = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $asal_negara = $_POST['asal_negara'];
    $jumlah_karya = $_POST['jumlah_karya'];

    $stmt = $conn->prepare("UPDATE Penulis SET nama = ?, asal_negara = ?, jumlah_karya = ? WHERE id_penulis = ?");
    $stmt->execute([$nama, $asal_negara, $jumlah_karya, $id]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Edit Penulis</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Penulis</h1>
        <form method="POST" class="mt-3">
            <input type="hidden" name="id" value="<?php echo $penulis['id_penulis']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $penulis['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="asal_negara" class="form-label">Asal Negara</label>
                <input type="text" class="form-control" id="asal_negara" name="asal_negara" value="<?php echo $penulis['asal_negara']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_karya" class="form-label">Jumlah Karya</label>
                <input type="number" class="form-control" id="jumlah_karya" name="jumlah_karya" value="<?php echo $penulis['jumlah_karya']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
