<?php
include '../config.php';

if (isset($_GET['id_buku']) && isset($_GET['id_penulis'])) {
    $id_buku = $_GET['id_buku'];
    $id_penulis = $_GET['id_penulis'];
    $stmt = $conn->prepare("DELETE FROM Relasi_Buku_Penulis WHERE id_buku = ? AND id_penulis = ?");
    $stmt->execute([$id_buku, $id_penulis]);

    header("Location: index.php");
}
?>
