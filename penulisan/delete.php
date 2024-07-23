<?php
include '../config.php';

if (isset($_GET['id_penulis']) && isset($_GET['id_buku'])) {
    $id_penulis = $_GET['id_penulis'];
    $id_buku = $_GET['id_buku'];
    $stmt = $conn->prepare("DELETE FROM Penulisan WHERE id_penulis = ? AND id_buku = ?");
    $stmt->execute([$id_penulis, $id_buku]);

    header("Location: index.php");
}
?>
