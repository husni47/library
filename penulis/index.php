<?php
include '../config.php';
$stmt = $conn->prepare("SELECT * FROM Penulis");
$stmt->execute();
$penulis = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Manage Penulis</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Daftar Penulis</h1>
        <a href="create.php" class="btn btn-primary mt-3">Tambah Penulis</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID Penulis</th>
                    <th>Nama</th>
                    <th>Asal Negara</th>
                    <th>Jumlah Karya</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penulis as $row): ?>
                    <tr>
                        <td><?php echo $row['id_penulis']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['asal_negara']; ?></td>
                        <td><?php echo $row['jumlah_karya']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id_penulis']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id_penulis']; ?>" class="btn btn-danger">Hapus</a>
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
