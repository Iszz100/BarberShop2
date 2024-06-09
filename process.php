<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
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
<a href="layanan.php" class="btn-kembali">Kembali</a>
</body>
</html>

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

// Function to add a new customer
function addCustomer($conn, $name, $email, $phone) {
    // Check if the email already exists
    $sql = "SELECT * FROM Customers WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Error: Email already exists<br>";
        return null;
    }

    // Insert new customer
    $sql = "INSERT INTO Customers (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) {
        return $conn->insert_id; // Return the ID of the new customer
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
        return null;
    }
}

// Function to create a new booking
function createBooking($conn, $customer_id, $barber_id, $booking_time, $service, $transaction_id, $payment_proof) {
    // Check if the barber_id exists
    $sql = "SELECT * FROM Barbers WHERE barber_id = $barber_id";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        echo "Error: Barber ID does not exist<br>";
        return;
    }

    // Insert booking data
    $sql = "INSERT INTO Bookings (customer_id, barber_id, booking_time, service, transaction_id, payment_proof) 
            VALUES ($customer_id, $barber_id, '$booking_time', '$service', '$transaction_id', '$payment_proof')";
    if ($conn->query($sql) === TRUE) {
        echo "New booking created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $barber_id = $_POST['barber_id'];
    $booking_time = $_POST['booking_time'];
    $service = $_POST['service'];
    $transaction_id = $_POST['transaction_id'];

    // Add new customer and get the customer ID
    $customer_id = addCustomer($conn, $name, $email, $phone);

    // Check if payment_proof is set and move uploaded file to desired location
    if (isset($_FILES["payment_proof"]["tmp_name"])) {
        $payment_proof_tmp = $_FILES["payment_proof"]["tmp_name"];
        $target_dir = "uploads/"; // Direktori tempat menyimpan bukti transaksi
        $payment_proof_name = basename($_FILES["payment_proof"]["name"]);
        $target_file = $target_dir . $payment_proof_name;
        move_uploaded_file($payment_proof_tmp, $target_file);
    } else {
        echo "Error: No payment proof uploaded<br>";
        return;
    }

    // Create a new booking if the customer was added successfully and payment proof was uploaded
    if ($customer_id) {
        createBooking($conn, $customer_id, $barber_id, $booking_time, $service, $transaction_id, $payment_proof_name);
    }
}

// Close the connection
$conn->close();
?>
