<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dukungan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .btn-submit {
            display: inline-block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
        }

        .btn-submit:hover {
            background-color: black;
        }

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

        .error {
            color: red;
            margin-bottom: 20px;
            display: none;
        }

        .qr-code {
            text-align: center;
            margin-bottom: 20px;
        }

        .qr-code img {
            width: 300px;
            height: 300px;
        }
    </style>
    <script>
        function validateForm() {
            var name = document.forms["donationForm"]["name"].value;
            var pesan = document.forms["donationForm"]["pesan"].value;
            var nominal = document.forms["donationForm"]["nominal"].value;
            var bukti_tf = document.forms["donationForm"]["bukti_tf"].value;

            if (name == "" || pesan == "" || nominal == "" || bukti_tf == "") {
                document.getElementById("error-message").style.display = "block";
                return false;
            } else {
                document.getElementById("error-message").style.display = "none";
            }
            return true;
        }

        function formatCurrency(input) {
            var value = input.value.replace(/[^\d]/g, '');
            var formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value / 100);

            input.value = formattedValue;
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Berikan dukungan anda ke kami</h2>
    <div id="error-message" class="error">Semua field harus diisi!</div>
    <form name="donationForm" action="koneksi_donated.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" required></textarea>
        
        <label for="nominal">Nominal:</label>
        <input type="text" id="nominal" name="nominal" oninput="formatCurrency(this)" required>
        
        <div class="qr-code">
            <label for="qr-code">Scan QR Code untuk Donasi:</label>
            <img src="qr3.jpg" alt="QR Code">
        </div>

        <label for="bukti_tf">Bukti Transfer:</label>
        <input type="file" id="bukti_tf" name="bukti_tf" accept="image/*" required>
        
        <button type="submit" class="btn-submit">Submit</button>
        <a href="index.php" class="btn-kembali">Kembali</a>
    </form>
</div>

</body>
</html>
