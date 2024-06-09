
<!DOCTYPE html>
<html>
<head>
    <title>Tabel View</title>
    <style>
     
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
.btn-create {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 15px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    padding right: 10px;
}

.btn-create:hover {
    background-color: #555;
}

        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
        }
       
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    </div>
    <a href="admin.php" class="btn-kembali">Kembali</a>
    <a href="add.php" class="btn-create">Create</a>
</div>
    <tbody>
        <?php
            // Koneksi ke database
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "barbershop"; 

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mendapatkan data dari database
            $sql = "SELECT id, username, email, password, role FROM user";
            $result = $conn->query($sql);

            // Jika terdapat data, tampilkan dalam tabel
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$row["username"]."</td>
                            <td>".$row["email"]."</td>
                            <td>".$row["password"]."</td>
                            <td>".$row["role"]."</td>
                            <td>
                                <a class='edit-btn' href='edit_user.php?id=".$row["id"]."'>Edit</a>
                                <a class='delete-btn' href='javascript:void(0);' onclick='deleteUser(".$row["id"].")'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
            }
            $conn->close();
        ?>
    </tbody>
</table>

<script>
    function deleteUser(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
           
            var xhttp = new XMLHttpRequest();
           
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    var row = document.querySelector('tr[data-id="' + id + '"]');
                    if (row) {
                        row.parentNode.removeChild(row);
                    }
                }
            };
            // Kirim request ke server
            xhttp.open("GET", "delete_user.php?id=" + id, true);
            xhttp.send();
        }
    }
</script>

</body>
</html>
