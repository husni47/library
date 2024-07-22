<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Anggota WHERE id_anggota = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
}
?>
