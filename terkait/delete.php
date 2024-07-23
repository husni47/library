<?php
include '../config.php';

if (isset($_GET['id_peminjaman']) && isset($_GET['id_detail_peminjaman'])) {
    $id_peminjaman = $_GET['id_peminjaman'];
    $id_detail_peminjaman = $_GET['id_detail_peminjaman'];
    $stmt = $conn->prepare("DELETE FROM Terkait WHERE id_peminjaman = ? AND id_detail_peminjaman = ?");
    $stmt->execute([$id_peminjaman, $id_detail_peminjaman]);

    header("Location: index.php");
}
?>
