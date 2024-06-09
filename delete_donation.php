<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM donations WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Donasi berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    die("ID tidak ditemukan.");
}

$conn->close();

header("Location: data_donated.php");
exit();
?>
