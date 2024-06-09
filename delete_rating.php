<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barbershop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Gunakan pernyataan yang dipersiapkan untuk menghindari injeksi SQL
    $stmt = $conn->prepare("DELETE FROM rating WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Rating berhasil dihapus.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID tidak ditemukan.";
}
?>
