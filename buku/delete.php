<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Buku WHERE id_buku = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
}
?>
