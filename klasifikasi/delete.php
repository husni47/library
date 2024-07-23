<?php
include '../config.php';

if (isset($_GET['id_kategori']) && isset($_GET['id_buku'])) {
    $id_kategori = $_GET['id_kategori'];
    $id_buku = $_GET['id_buku'];
    $stmt = $conn->prepare("DELETE FROM Klasifikasi WHERE id_kategori = ? AND id_buku = ?");
    $stmt->execute([$id_kategori, $id_buku]);

    header("Location: index.php");
}
?>
