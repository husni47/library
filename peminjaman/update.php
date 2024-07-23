<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id]);
    $peminjaman = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $id_anggota = $_POST['id_anggota'];
    $id_petugas = $_POST['id_petugas'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $stmt = $conn->prepare("UPDATE Peminjaman SET id_anggota = ?, id_petugas = ?, tanggal_pinjam = ?, tanggal_kembali = ? WHERE id_peminjaman = ?");
    $stmt->execute([$id_anggota, $id_petugas, $tanggal_pinjam, $tanggal_kembali, $id]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Edit Peminjaman</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Peminjaman</h1>
        <form method="POST" class="mt-3">
            <input type="hidden" name="id" value="<?php echo $peminjaman['id_peminjaman']; ?>">
            <div class="mb-3">
                <label for="id_anggota" class="form-label">ID Anggota</label>
                <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?php echo $peminjaman['id_anggota']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_petugas" class="form-label">ID Petugas</label>
                <input type="text" class="form-control" id="id_petugas" name="id_petugas" value="<?php echo $peminjaman['id_petugas']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?php echo $peminjaman['tanggal_pinjam']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?php echo $peminjaman['tanggal_kembali']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
