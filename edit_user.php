<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pengguna</title>
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
            background-color: pink;
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
            color: white;
            padding-bottom: 300px;
            
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
            padding-bottom: 25px;  
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
            margin-left: 20px;
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
            font-size: 104px;
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
            width: 200%;
            margin-top: 100px;
            padding: 10px;
            
            display: block;
            font-size: 20px;
            color:white;
            border: none;
            border-radius: 5px;
            background-color: black;
            cursor: pointer;
            transition: 0.3s;
        }
    </style>
</head>
<body>

<h2>Edit Data Pengguna</h2>

<?php
    // Koneksi ke database
    $servername ="localhost";
    $username = "root";
    $password = "";
    $dbname = "barbershop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Periksa ID pengguna disediakan melalui GET
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        // Query untuk mendapatkan data pengguna berdasarkan ID
        $sql = "SELECT * FROM user WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Tampilkan formulir untuk mengedit data pengguna
?>

<form action="update_user.php" method="post">
    <div class="content">
        <div class="">
            <label for="id"></label>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?> ">
        </div>
        <div class="input-box">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $row['username']; ?> ">
        </div>
        <div class="input-box">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?> ">
        </div>
        <div class="input-box">
            <label for="role">Role</label>
            <select name="role" id="role">
                <option value="user" <?php echo $row['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                <option value="admin" <?php echo $row['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
            </select>
        </div>
        <div class="button-container">
            <button type="submit" name="login">Update</button>
        </div>
    </div>
</form>

<?php
        } else {
            echo "Data pengguna tidak ditemukan.";
        }
    } else {
        echo "ID pengguna tidak diberikan.";
    }

    $conn->close();
?>

</body>
</html>
