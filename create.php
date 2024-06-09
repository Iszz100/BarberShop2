<?php
require 'koneksi.php';


if( isset($_POST["register"]) ) {

    if ( registrasi($_POST) > 0 ) {
        echo "<script>
        alert('user baru sudah di tambah kan')
        </script>";
        header("Location: data2.php");
    } else {
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
        <title>Register</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <style>
            *{
    padding: 0;
    margin: 0;
    font-family: sans-serif;
    box-sizing: border-box;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: white;
}
.Container{
    max-width: 650px;
    padding: 28px;
    margin: 0 28px;
    border-radius: 10px;
    overflow: hidden;
    background: rgba(0, 0, 0, 0.2);
    box-shadow: 0 15px 20px rgba(0,0,0,0.6);
}
h2{
    font-size: 26px;
    font-weight: bold;
    text-align: left;
    color: black;
    padding-bottom: 8px;
    border-bottom: 1px solid silver;
}
.content{   
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px 0;
}
.input-box{
    display: flex;
    flex-wrap: wrap;
    width: 50%;
    padding-bottom: 15px;  
}
.input-box:nth-child(2n){
    justify-content: end;
}
.input-box label, .role-tittle{
    width: 95%;
    color: white;
    font-weight: bold;
    margin: 5px 0;
}
.role-tittle{
    font-size: 16px;
}
.input-box input{
    height: 40px;
    width: 95%;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}
.input-box input:is(:focus,:valid){
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}
.role-category label{
    padding:0 20px 0 5px;
    font-size: 14px;
}
.role-title{
    color: white;
}
.role-category{
    color: gainsboro;
}
.role-category label, .role-category input{
    cursor: pointer;
}
.button-container button{
    width: 100%;
    margin-top: 10px;
    padding: 10px;
    display: block;
    font-size: 20px;
    color: white;
    border: none;
    border-radius: 5px;
    background-color: black;
    cursor: pointer;
    transition: 0.3s;
}
        </style>
    </head>
    <body>
        <div class="Container">
            <form action="" method="post">
                <h2>Create Data baru</h2>
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
                        <button type="submit" name="register">Create!</button>
                </div>
            </form>
        </div>
    </body>
</html>