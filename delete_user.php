<?php
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

// Ambil ID pengguna yang akan dihapus dari parameter GET
$id = $_GET['id'];

// Query untuk menghapus pengguna berdasarkan ID
$sql = "DELETE FROM user WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
