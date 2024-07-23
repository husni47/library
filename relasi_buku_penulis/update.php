<?php
include '../config.php';

if (isset($_GET['id_buku']) && isset($_GET['id_penulis'])) {
    $id_buku = $_GET['id_buku'];
    $id_penulis = $_GET['id_penulis'];
    $stmt = $conn->prepare("SELECT * FROM Relasi_Buku_Penulis WHERE id_buku = ? AND id_penulis = ?");
    $stmt->execute([$id_buku, $id_penulis]);
    $relasi_buku_penulis = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_buku_old = $_POST['id_buku_old'];
    $id_penulis_old = $_POST['id_penulis_old'];
    $id_buku = $_POST['id_buku'];
    $id_penulis = $_POST['id_penulis'];

    $stmt = $conn->prepare("UPDATE Relasi_Buku_Penulis SET id_buku = ?, id_penulis = ? WHERE id_buku = ? AND id_penulis = ?");
    $stmt->execute([$id_buku, $id_penulis, $id_buku_old, $id_penulis_old]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Edit Relasi Buku Penulis</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Relasi Buku Penulis</h1>
        <form method="POST" class="mt-3">
            <input type="hidden" name="id_buku_old" value="<?php echo $relasi_buku_penulis['id_buku']; ?>">
            <input type="hidden" name="id_penulis_old" value="<?php echo $relasi_buku_penulis['id_penulis']; ?>">
            <div class="mb-3">
                <label for="id_buku" class="form-label">ID Buku</label>
                <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?php echo $relasi_buku_penulis['id_buku']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_penulis" class="form-label">ID Penulis</label>
                <input type="text" class="form-control" id="id_penulis" name="id_penulis" value="<?php echo $relasi_buku_penulis['id_penulis']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
