<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Petugas WHERE id_petugas = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
}
?>
