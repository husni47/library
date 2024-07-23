<?php
include '../config.php';

if (isset($_GET['id_petugas']) && isset($_GET['id_peminjaman'])) {
    $id_petugas = $_GET['id_petugas'];
    $id_peminjaman = $_GET['id_peminjaman'];
    $stmt = $conn->prepare("SELECT * FROM Melayani WHERE id_petugas = ? AND id_peminjaman = ?");
    $stmt->execute([$id_petugas, $id_peminjaman]);
    $melayani = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_petugas_old = $_POST['id_petugas_old'];
    $id_peminjaman_old = $_POST['id_peminjaman_old'];
    $id_petugas = $_POST['id_petugas'];
    $id_peminjaman = $_POST['id_peminjaman'];

    $stmt = $conn->prepare("UPDATE Melayani SET id_petugas = ?, id_peminjaman = ? WHERE id_petugas = ? AND id_peminjaman = ?");
    $stmt->execute([$id_petugas, $id_peminjaman, $id_petugas_old, $id_peminjaman_old]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Edit Melayani</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Melayani</h1>
        <form method="POST" class="mt-3">
            <input type="hidden" name="id_petugas_old" value="<?php echo $melayani['id_petugas']; ?>">
            <input type="hidden" name="id_peminjaman_old" value="<?php echo $melayani['id_peminjaman']; ?>">
            <div class="mb-3">
                <label for="id_petugas" class="form-label">ID Petugas</label>
                <input type="text" class="form-control" id="id_petugas" name="id_petugas" value="<?php echo $melayani['id_petugas']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_peminjaman" class="form-label">ID Peminjaman</label>
                <input type="text" class="form-control" id="id_peminjaman" name="id_peminjaman" value="<?php echo $melayani['id_peminjaman']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
