<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hasil Update</title>
<style>
.btn-kembali {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.btn-kembali:hover {
    background-color: #555;
}</style>
</head>
<body>
    </div>
    <a href="crud_rating.php" class="btn-kembali">Kembali</a>
</div>
</body>
</html>


<?php
// Pastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui form
    $id = $_POST['id'];
    $star = $_POST['star'];
    $name = $_POST['name'];
    $pesan = $_POST['pesan'];

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

    // Query untuk melakukan update rating berdasarkan ID
    $sql = "UPDATE rating SET star='$star', name='$name', pesan='$pesan' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Rating berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
