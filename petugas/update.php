<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Petugas WHERE id_petugas = ?");
    $stmt->execute([$id]);
    $petugas = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_petugas = $_POST['nama_petugas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $shift = $_POST['shift'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];

    $stmt = $conn->prepare("UPDATE Petugas SET nama_petugas = ?, jenis_kelamin = ?, shift = ?, alamat = ?, jabatan = ? WHERE id_petugas = ?");
    $stmt->execute([$nama_petugas, $jenis_kelamin, $shift, $alamat, $jabatan, $id]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Edit Petugas</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Petugas</h1>
        <form method="POST" class="mt-3">
            <input type="hidden" name="id" value="<?php echo $petugas['id_petugas']; ?>">
            <div class="mb-3">
                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?php echo $petugas['nama_petugas']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-Laki" <?php if ($petugas['jenis_kelamin'] == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                    <option value="Perempuan" <?php if ($petugas['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="shift" class="form-label">Shift</label>
                <input type="text" class="form-control" id="shift" name="shift" value="<?php echo $petugas['shift']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $petugas['alamat']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $petugas['jabatan']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
