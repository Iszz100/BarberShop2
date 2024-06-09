<!DOCTYPE html>
<html>
<head>
    <title>Edit Rating</title>
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
            padding-top: 50px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
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

<div class="container">
    <h2>Edit Rating</h2>
    <?php
        // Ambil ID rating yang akan diedit dari parameter URL
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

        // Query untuk mendapatkan data rating berdasarkan ID
        $sql = "SELECT * FROM rating WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="update_rating.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="star">Star:</label>
    <input type="number" id="star" name="star" value="<?php echo $row['star']; ?>" min="1" max="5"><br>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>

    <label for="pesan">Pesan:</label>
    <textarea id="pesan" name="pesan" rows="4" cols="50"><?php echo $row['pesan']; ?></textarea><br>

    <input type="submit" value="Submit">
    <a href="crud_rating.php" class="btn-kembali">Kembali</a>
</form>

            <?php
        } else {
            echo "Data tidak ditemukan";
        }
        $conn->close();
    ?>
</div>

</body>
</html>
