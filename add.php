<?php
session_start();
require 'koneksi.php';


if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0 ) {
      echo "<script>
      alert('user berhasil di tambahkan')
      </script>";
    }
    else{
      echo mysqli_error($conn);
    }
  }
  

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>ADDCRUD</title>
        <link rel="stylesheet" href="add.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>

        <div class="Container">
            <form action="" method="post">
                <h2>ADD</h2>
                <div class="content">
                    <div class="input-box">
                        <label for="username">Username</label>
                        <input type="text" placeholder="Enter your name" name="username" required>
                    </div>
                    <div class="input-box">
                        <label for="email">Email Id</label>
                        <input type="email" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Password!</label>
                        <input type="password" placeholder="Enter your password" name="password" required>
                    </div>
                    <div class="input-box">
                        <label for="password2">Konfirmasi Password!</label>
                        <input type="password" placeholder="Enter your password" name="password2" required>
                    </div>
                    <div class="role-category">
                    <select name="role" id="role"required>
                            <option disabled selected> Pilih </option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <div class="button-container">
                        <button type="submit" name="register">Add!</button>
                        <a href="data2.php" class="btn-kembali">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
       
    </body>
</html>