<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM donations WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        die("Donasi tidak ditemukan.");
    }
} else {
    die("ID tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $pesan = $_POST["pesan"];
    $nominal = preg_replace('/[^\d]/', '', $_POST["nominal"]);
    $bukti_tf = $_FILES["bukti_tf"];

    if (!empty($bukti_tf["name"])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($bukti_tf["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($bukti_tf["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "Maaf, file sudah ada.";
            $uploadOk = 0;
        }

        if ($bukti_tf["size"] > 5000000) {
            echo "Maaf, file terlalu besar.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
            echo "Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Maaf, file tidak terupload.";
        } else {
            if (move_uploaded_file($bukti_tf["tmp_name"], $target_file)) {
                $sql = "UPDATE donations SET name='$name', pesan='$pesan', nominal='$nominal', bukti_tf='$target_file' WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    echo "Donasi berhasil diupdate.";
                    header("Location: data_donated.php");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Maaf, ada kesalahan saat mengupload file.";
            }
        }
    } else {
        $sql = "UPDATE donations SET name='$name', pesan='$pesan', nominal='$nominal' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Donasi berhasil diupdate.";
            header("Location: data_donated.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .btn-submit {
            display: inline-block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-bottom: 20px;
            display: none;
        }

        .qr-code {
            text-align: center;
            margin-bottom: 20px;
        }

        .qr-code img {
            width: 150px;
            height: 150px;
        }
    </style>
    <script>
        function validateForm() {
            var name = document.forms["donationForm"]["name"].value;
            var pesan = document.forms["donationForm"]["pesan"].value;
            var nominal = document.forms["donationForm"]["nominal"].value;

            if (name == "" || pesan == "" || nominal == "") {
                document.getElementById("error-message").style.display = "block";
                return false;
            } else {
                document.getElementById("error-message").style.display = "none";
            }
            return true;
        }

        function formatCurrency(input) {
            var value = input.value.replace(/[^\d]/g, '');
            var formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value / 100);

            input.value = formattedValue;
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Edit Donasi</h2>
    <div id="error-message" class="error">Semua field harus diisi!</div>
    <form name="donationForm" action="edit_donation.php?id=<?php echo $id; ?>" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
        
        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" required><?php echo htmlspecialchars($row['pesan']); ?></textarea>
        
        <label for="nominal">Nominal:</label>
        <input type="text" id="nominal" name="nominal" oninput="formatCurrency(this)" value="<?php echo number_format($row['nominal'], 0, ',', '.'); ?>" required>
        
        <div class="qr-code">
            <label for="qr-code">Scan QR Code untuk Donasi:</label>
            <img src="qr3.jpg" alt="QR Code">
        </div>

        <label for="bukti_tf">Bukti Transfer:</label>
        <input type="file" id="bukti_tf" name="bukti_tf" accept="image/*">
        
        <button type="submit" class="btn-submit">Update</button>
    </form>
</div>

</body>
</html>
