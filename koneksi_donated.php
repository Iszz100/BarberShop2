<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donated</title>
    <style>
    .btn-kembali {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 15px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    padding right: 10px;
}

.btn-kembali:hover {
    background-color: #555;
}
    </style>
</head>
<body>
<a href="index.php" class="btn-kembali">Kembali</a>
</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbershop"; // ganti sesuai nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $pesan = $_POST["pesan"];
    $nominal = preg_replace('/[^\d]/', '', $_POST["nominal"]); // Hapus karakter non-numerik
    $bukti_tf = $_FILES["bukti_tf"];

    // Path untuk menyimpan file yang diupload
    $target_dir = "upload/";
    $target_file = $target_dir . basename($bukti_tf["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file adalah gambar sebenarnya
    $check = getimagesize($bukti_tf["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Cek jika file sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($bukti_tf["size"] > 5000000) { // maksimal 5MB
        echo "Maaf, file terlalu besar.";
        $uploadOk = 0;
    }

    // Batasi format file yang diperbolehkan
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk bernilai 0
    if ($uploadOk == 0) {
        echo "Maaf, file tidak terupload.";
    } else {
        if (move_uploaded_file($bukti_tf["tmp_name"], $target_file)) {
            $sql = "INSERT INTO donations (name, pesan, nominal, bukti_tf) VALUES ('$name', '$pesan', '$nominal', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "Donasi berhasil disimpan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Maaf, ada kesalahan saat mengupload file.";
        }
    }
}

$conn->close();
?>
