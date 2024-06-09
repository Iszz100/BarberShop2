<?php
// Koneksi ke database
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "barbershop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Query untuk mengupdate data pengguna
    $sql = "UPDATE user SET username='$username', email='$email', role='$role' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data pengguna berhasil diupdate.";
        header("Location: data2.php"); // Ganti dengan halaman yang sesuai
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
