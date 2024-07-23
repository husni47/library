<?php
include '../config.php';

if (isset($_GET['id_detail_peminjaman']) && isset($_GET['id_buku'])) {
    $id_detail_peminjaman = $_GET['id_detail_peminjaman'];
    $id_buku = $_GET['id_buku'];
    $stmt = $conn->prepare("SELECT * FROM Indikasi WHERE id_detail_peminjaman = ? AND id_buku = ?");
    $stmt->execute([$id_detail_peminjaman, $id_buku]);
    $indikasi = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_detail_peminjaman_old = $_POST['id_detail_peminjaman_old'];
    $id_buku_old = $_POST['id_buku_old'];
    $id_detail_peminjaman = $_POST['id_detail_peminjaman'];
    $id_buku = $_POST['id_buku'];

    $stmt = $conn->prepare("UPDATE Indikasi SET id_detail_peminjaman = ?, id_buku = ? WHERE id_detail_peminjaman = ? AND id_buku = ?");
    $stmt->execute([$id_detail_peminjaman, $id_buku, $id_detail_peminjaman_old, $id_buku_old]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Edit Indikasi</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Indikasi</h1>
        <form method="POST" class="mt-3">
            <input type="hidden" name="id_detail_peminjaman_old" value="<?php echo $indikasi['id_detail_peminjaman']; ?>">
            <input type="hidden" name="id_buku_old" value="<?php echo $indikasi['id_buku']; ?>">
            <div class="mb-3">
                <label for="id_detail_peminjaman" class="form-label">ID Detail Peminjaman</label>
                <input type="text" class="form-control" id="id_detail_peminjaman" name="id_detail_peminjaman" value="<?php echo $indikasi['id_detail_peminjaman']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_buku" class="form-label">ID Buku</label>
                <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?php echo $indikasi['id_buku']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
