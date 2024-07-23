<?php
include '../config.php';
$stmt = $conn->prepare("SELECT * FROM Melayani");
$stmt->execute();
$melayani = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Manage Melayani</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Daftar Melayani</h1>
        <a href="create.php" class="btn btn-primary mt-3">Tambah Melayani</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID Petugas</th>
                    <th>ID Peminjaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($melayani as $row): ?>
                    <tr>
                        <td><?php echo $row['id_petugas']; ?></td>
                        <td><?php echo $row['id_peminjaman']; ?></td>
                        <td>
                            <a href="update.php?id_petugas=<?php echo $row['id_petugas']; ?>&id_peminjaman=<?php echo $row['id_peminjaman']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id_petugas=<?php echo $row['id_petugas']; ?>&id_peminjaman=<?php echo $row['id_peminjaman']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
