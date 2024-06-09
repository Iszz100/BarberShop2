<?php
// Hubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbershop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Simpan rating jika ada data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $star = $_POST["star"];
    $name = $_POST["name"];
    $pesan = $_POST["pesan"];

    $sql = "INSERT INTO rating (star, name, pesan)
            VALUES ('$star', '$name', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        echo "Rating berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Berhasil</title>
    <style>
        .btn-kembali {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 10px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.btn-kembali:hover {
    background-color: #555;
}
    </style>
</head>
<body>
    
<a href="crud_rating.php" class="btn-kembali">Kembali</a>
    
</body>
</html>
