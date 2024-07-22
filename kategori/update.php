<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Kategori WHERE id_kategori = ?");
    $stmt->execute([$id]);
    $kategori = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];
    $jenis_kategori = $_POST['jenis_kategori'];

    $stmt = $conn->prepare("UPDATE Kategori SET nama_kategori = ?, jenis_kategori = ? WHERE id_kategori = ?");
    $stmt->execute([$nama_kategori, $jenis_kategori, $id]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Edit Kategori</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Kategori</h1>
        <form method="POST" class="mt-3">
            <input type="hidden" name="id" value="<?php echo $kategori['id_kategori']; ?>">
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $kategori['nama_kategori']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kategori" class="form-label">Jenis Kategori</label>
                <input type="text" class="form-control" id="jenis_kategori" name="jenis_kategori" value="<?php echo $kategori['jenis_kategori']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
