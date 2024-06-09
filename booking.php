<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
        }
        input, select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            margin-bottom: 70px;
            background-color: black;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #333;
        }
        .btn-kembali {
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
        <h2>Customer and Booking Form</h2>
        <form action="process.php" method="post" enctype="multipart/form-data">

            <h3>Customer Information</h3>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
            
            <h3>Booking Information</h3>
            <label for="barber_id">Barber:</label>
            <select id="barber_id" name="barber_id" required>
                <?php
                // PHP code to fetch barbers from the database and populate the dropdown
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "barbershop";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT barber_id, name FROM Barbers";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->execute();
                    $stmt->bind_result($barber_id, $name);

                    while ($stmt->fetch()) {
                        echo "<option value='" . htmlspecialchars($barber_id, ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</option>";
                    }

                    $stmt->close();
                } else {
                    echo "<option value=''>No barbers available</option>";
                }

                $conn->close();
                ?>
            </select>
            
            <label for="booking_time">Booking Time:</label>
            <input type="datetime-local" id="booking_time" name="booking_time" required>
            
            <label for="service">Service:</label>
            <input type="text" id="service" name="service" required>

            <label for="transaction_id">Tranksaksi Pembayaran:</label>
            <input type="text" id="transaction_id" name="transaction_id" required>

            <label for="payment_proof">Bukti Tranksaksi:</label>
            <input type="file" id="payment_proof" name="payment_proof" accept="image/*" required>


            
            <button type="submit" name="submit">Submit</button>
        </form>
        <a href="layanan.php" class="btn-kembali">Kembali</a>
    </div>
</body>
</html>
