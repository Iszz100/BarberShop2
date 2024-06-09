<?php

$server ="localhost";
$username = "root";
$password = "";
$database_name = "barbershop";

$conn = mysqli_connect ($server, $username, $password, $database_name);


function registrasi($data) {
    global $conn;

    $username = $data ["username"];
    $email = $data ["email"];
    $password = $data ["password"];
    $password2 = $data ["password2"];
    $role = "user";
    // cek email

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($result) ) {
        echo "<script> 
                alert('Email sudah terdaftar!!'); 
              </script>"; 
        return false;      
    }
    
    // cek konfirmasi pass

    if( $password !== $password2 ) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!!')
        </script>";
        return false;
    }


   
    // tambah user baru ke db

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password', '$role')");

       return mysqli_affected_rows($conn);
}



?>
