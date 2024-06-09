<?php
session_start();

require 'koneksi.php';

// Periksa apakah pengguna sudah masuk
if(isset($_SESSION["email"])) {
    if($_SESSION['role'] == 'admin'){
        header("location: admin.php");
    } else {
        header("location: index.php");
    }
    exit; // Pastikan untuk keluar dari skrip setelah pengalihan header
}

// Jika tombol login ditekan
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query database
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

    // Cek apakah ada hasil yang ditemukan
    if(mysqli_num_rows($result) === 1 ){
        $row = mysqli_fetch_assoc($result);
        
        // Periksa apakah password cocok
        if ($password == $row["password"]) {
            $_SESSION['email']= $row['email'];
            $_SESSION['role']=$row['role'];
            
            // Arahkan sesuai dengan role pengguna
            if($row['role']== 'admin'){
                header("location: admin.php");
            }
            else {
                header("location: index.php");
            }
            exit; // Pastikan untuk keluar dari skrip setelah pengalihan header
        } else {
            echo '<script> 
            alert("Password atau username/email salah")
            </script>';
            exit; // Pastikan untuk keluar dari skrip jika password tidak cocok
        }   
    } else {
        $error = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>Log-In</title>
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <div class="Container">
            <form action="" method="post">
                <h2>Log-In</h2>

 <?php if( isset($error) ) : ?>
<p style="color: red; font-sytle: italic">password salah</p>
    <?php endif; ?>

                <div class="content">
                <div class="input-box">
                        <label for="username">Username</label>
                        <input type="text" placeholder="Enter your username" name="username" required>
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Enter your password" name="password" required>
                    </div>
                    <div class="button-container">
                        <button type="submit" name="login">Log-In</button>
                    </div> 
            </form>
        </div>
        <p>Belum punya akun, Register dulu dong <a href="register.php">Register here</a>.</p>
    </body>
</html>