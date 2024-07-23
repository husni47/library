<?php
include '../config.php';

if (isset($_GET['id_petugas']) && isset($_GET['id_peminjaman'])) {
    $id_petugas = $_GET['id_petugas'];
    $id_peminjaman = $_GET['id_peminjaman'];
    $stmt = $conn->prepare("DELETE FROM Melayani WHERE id_petugas = ? AND id_peminjaman = ?");
    $stmt->execute([$id_petugas, $id_peminjaman]);

    header("Location: index.php");
}
?>
