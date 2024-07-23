<?php
include '../config.php';

if (isset($_GET['id_detail_peminjaman']) && isset($_GET['id_buku'])) {
    $id_detail_peminjaman = $_GET['id_detail_peminjaman'];
    $id_buku = $_GET['id_buku'];
    $stmt = $conn->prepare("DELETE FROM Indikasi WHERE id_detail_peminjaman = ? AND id_buku = ?");
    $stmt->execute([$id_detail_peminjaman, $id_buku]);

    header("Location: index.php");
}
?>
