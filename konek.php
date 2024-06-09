<?php

$server ="localhost";
$username = "root";
$password = "";
$database_name = "barbershop";

$conn = mysqli_connect ($server, $username, $password, $database_name);


function register($data) {
    global $conn;

    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];
    $notlp = $data["notlp"];
    $level = "user";
    // cek email

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($result) ) {
        echo "<script> 
                alert('email sudah terdaftar!!'); 
              </script>"; 
        return false;      
    }

    // pengecekan password

    if ($password !== $password) {
        echo '<script> 
        alert("password tidak sesuai"); 
        </script>';

     return false;
    }
//  return 1;


       mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password', '$notlp', '$level')");

       return mysqli_affected_rows($conn);

}


?>