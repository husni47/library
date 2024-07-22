<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Penulis WHERE id_penulis = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
}
?>
