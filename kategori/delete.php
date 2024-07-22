<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Kategori WHERE id_kategori = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
}
?>
