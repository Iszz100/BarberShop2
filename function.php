<?php
$server ="localhost";
$userName = "root";
$password = "";
$database_name = "barbershop";

$conn = mysqli_connect ($server, $userName, $password, $database_name);

function register($data){
    global $conn;

    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];
    $level ="user";

    
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    // cek email
    if ( mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('email sudah terdaftar')
        </script>";
        return false;
    }

    // cek pass

    if ($password !== $password) {
        echo '<script> 
        alert("password tidak sesuai"); 
        </script>';

     return false;
    }
    mysqli_query($conn , "INSERT INTO user VALUES ('', '$username', '$email', '$password', '$level' )");

    return mysqli_affected_rows($conn);

}
?>