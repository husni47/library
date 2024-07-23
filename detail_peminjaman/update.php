<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Detail_Peminjaman WHERE id_detail_peminjaman = ?");
    $stmt->execute([$id]);
    $detail_peminjaman = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_buku = $_POST['id_buku'];
    $nama_buku = $_POST['nama_buku'];
    $denda = $_POST['denda'];

    $stmt = $conn->prepare("UPDATE Detail_Peminjaman SET id_peminjaman = ?, id_buku = ?, nama_buku = ?, denda = ? WHERE id_detail_peminjaman = ?");
    $stmt->execute([$id_peminjaman, $id_buku, $nama_buku, $denda, $id]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Edit Detail Peminjaman</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Detail Peminjaman</h1>
        <form method="POST" class="mt-3">
            <input type="hidden" name="id" value="<?php echo $detail_peminjaman['id_detail_peminjaman']; ?>">
            <div class="mb-3">
                <label for="id_peminjaman" class="form-label">ID Peminjaman</label>
                <input type="text" class="form-control" id="id_peminjaman" name="id_peminjaman" value="<?php echo $detail_peminjaman['id_peminjaman']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_buku" class="form-label">ID Buku</label>
                <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?php echo $detail_peminjaman['id_buku']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_buku" class="form-label">Nama Buku</label>
                <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="<?php echo $detail_peminjaman['nama_buku']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="denda" class="form-label">Denda</label>
                <input type="number" class="form-control" id="denda" name="denda" value="<?php echo $detail_peminjaman['denda']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
