<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rating Form</title>
<style>
    /* Style untuk form rating */
h2 {
    margin-bottom: 50px;
}

body{
    background-color: white;
} 

form {
    
    max-width: 500px;
    margin: 0 auto;
    margin-top: 150px;
    padding: 50px;
    padding-bottom: 30px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0px 10px 15px rgba(0,0,0,0.6);
}

label {
    font-weight: bold;
}

input[type="text"],

textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

textarea {
    height: 100px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Style untuk rating */
.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    align-items: center;
}

.star {
    font-size: 54px;
    cursor: pointer;
    transition: color 0.2s;
}

.star:hover,
.star.active {
    color: gold;
}

</style>
</head>
<body>



<form action="konekrating2.php" method="post">
<h2>Form Rating</h2>
    <label for="name">Nama:</label><br>
    <input type="text" id="name" name="name"><br><br>
    
    <div class="rating">
        <input type="hidden" id="star" name="star" value="0">
        <span class="star" data-value="5">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="1">&#9733;</span>
    </div><br><br>
    
    <label for="pesan">Pesan:</label><br>
    <textarea id="pesan" name="pesan" rows="4" cols="50"></textarea><br><br>

    <input type="submit" value="Submit">
</form>

<script>
    const stars = document.querySelectorAll('.star');
    const starInput = document.getElementById('star');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            starInput.value = value;
            stars.forEach(s => {
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
        });
    });
</script>

</body>
</html>
