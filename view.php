<?php
// Database configuration
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

// Query to update status to "Sudah dilayani" if booking_time has passed
$sql = "UPDATE bookings SET status = 'Sudah dilayani' WHERE booking_time <= NOW() AND status != 'Sudah dilayani'";

if ($conn->query($sql) === TRUE) {
    $rows_updated = $conn->affected_rows;
    if ($rows_updated > 0) {
        echo $rows_updated;
    }
} else {
    echo "Error updating status:" . $conn->error;
}

// Query to join tables and fetch data
$sql = "SELECT 
            Bookings.booking_id AS booking_id, 
            Customers.name AS customer_name, 
            Customers.phone AS customer_phone, 
            Barbers.name AS barber_name, 
            Bookings.service, 
            Bookings.status,
            Bookings.transaction_id,
            Bookings.payment_proof,
            Bookings.booking_time
        FROM 
            Bookings
        INNER JOIN 
            Customers ON Bookings.customer_id = Customers.customer_id
        INNER JOIN 
            Barbers ON Bookings.barber_id = Barbers.barber_id";

$result = $conn->query($sql);

if ($result === false) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
        .proof-img {
            max-width: 100px; /* adjust width as needed */
            max-height: 100px; /* adjust height as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Riwayat Booking</h1>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Nama Customer</th>
                    <th>No.HP Customer</th>
                    <th>Nama Barber</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Tranksaksi Pembayaran</th>
                    <th>Bukti Tranksaksi</th>
                    <th>Booking Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['booking_id']}</td>
                                <td>{$row['customer_name']}</td>
                                <td>{$row['customer_phone']}</td>
                                <td>{$row['barber_name']}</td>
                                <td>{$row['service']}</td>
                                <td>{$row['status']}</td>
                                <td>{$row['transaction_id']}</td>
                                <td><img src='uploads/{$row['payment_proof']}' class='proof-img'></td>
                                <td>{$row['booking_time']}</td>
                                <td><a href='edit_booking.php?booking_id={$row['booking_id']}'>Edit</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No bookings found</td></tr>";
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="layanan2.php" class="btn-kembali">Kembali</a>
    </div>
</body>
</html>
