<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Detail_Peminjaman WHERE id_detail_peminjaman = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
}
?>
