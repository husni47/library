<?php
include '../config.php';

if (isset($_GET['id_buku']) && isset($_GET['id_kategori'])) {
    $id_buku = $_GET['id_buku'];
    $id_kategori = $_GET['id_kategori'];
    $stmt = $conn->prepare("DELETE FROM Relasi_Buku_Kategori WHERE id_buku = ? AND id_kategori = ?");
    $stmt->execute([$id_buku, $id_kategori]);

    header("Location: index.php");
}
?>
