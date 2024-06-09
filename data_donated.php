<?php
include 'db_connect.php';

$sql = "SELECT * FROM donations ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Donasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: black;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .actions {
            text-align: center;
        }

        .btn {
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #f0ad4e;
            color: white;
        }

        .btn-delete {
            background-color: red;
            color: white;
        }
        .btn-submit {
            background-color: pink;
            color: white;
            margin-top: 20px;
            padding: 10px;
        }
    </style>
</head>
<body>

<h2>Daftar Donasi</h2>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Pesan</th>
            <th>Nominal</th>
            <th>Bukti Transfer</th>
            <th>Tanggal Donasi</th>
            <th class="actions">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pesan']) . "</td>";
                echo "<td>Rp " . number_format($row['nominal'], 0, ',', '.') . "</td>";
                echo "<td><img src='" . htmlspecialchars($row['bukti_tf']) . "' width='100'></td>";
                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                echo "<td class='actions'>
                        <a href='edit_donation.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                        <a href='delete_donation.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Anda yakin ingin menghapus donasi ini?\")'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada donasi.</td></tr>";
        }
        ?>
    </tbody>
</table>

<a href="create_donation.php" class="btn btn-submit">Tambah Donasi</a>
<a href="admin.php" class="btn btn-submit">Kembali</a>

</body>
</html>
