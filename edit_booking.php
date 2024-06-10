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

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
    
    // Fetch the booking details
    $sql = "SELECT * FROM Bookings WHERE booking_id = $booking_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $booking = $result->fetch_assoc();
    } else {
        die("Booking not found.");
    }
} elseif (isset($_POST['update'])) {
    // Handle form submission
    $booking_id = $_POST['booking_id'];
    $customer_id = $_POST['customer_id'];
    $barber_id = $_POST['barber_id'];
    $service = $_POST['service'];
    $status = $_POST['status'];
    $transaction_id = $_POST['transaction_id'];
    $booking_time = $_POST['booking_time'];
    
    $sql = "UPDATE Bookings 
            SET customer_id = '$customer_id', 
                barber_id = '$barber_id', 
                service = '$service', 
                status = '$status',
                transaction_id = '$transaction_id', 
                booking_time = '$booking_time' 
            WHERE booking_id = $booking_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Booking updated successfully.";
        header("Location: view.php"); // Redirect to the booking history page
    } else {
        echo "Error updating booking: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
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
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button[type="submit"] {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Booking</h1>
        <?php if (isset($booking)) { ?>
            <form action="edit_booking.php" method="post">
                <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                <label for="customer_id">Customer ID:</label>
                <input type="text" name="customer_id" value="<?php echo $booking['customer_id']; ?>">
                <label for="barber_id">Barber ID:</label>
                <input type="text" name="barber_id" value="<?php echo $booking['barber_id']; ?>">
                <label for="service">Service:</label>
                <input type="text" name="service" value="<?php echo $booking['service']; ?>">
                <label for="status">Status:</label>
                <input type="text" name="status" value="<?php echo $booking['status']; ?>">
                <label for="transaction_id">Transaction ID:</label>
                <input type="text" name="transaction_id" value="<?php echo $booking['transaction_id']; ?>">
                <label for="booking_time">Booking Time:</label>
                <input type="text" name="booking_time" value="<?php echo $booking['booking_time']; ?>">
                <button type="submit" name="update">Update Booking</button>
            </form>
        <?php } ?>
    </div>
</body>
</html>
