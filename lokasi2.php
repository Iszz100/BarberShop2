<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>BarberShop</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

.nav{
    color: white;
    display: flex;
    padding-top: 15px;
    padding-bottom: 10px;
    background-color: black;
    position: fixed;
    width: 100%;
    z-index: 1;
}

.nav a{
    color: white;
}

.nav li:hover{
background-color: black;
}

.data-list{
    margin-left: 38%;
}

.data-list li{
    display: inline-block;
    margin-left: 30px;
}

.fa-chevron-down{
  transform: rotate(0deg);
  transition: 300ms;
}

.isi:hover .fa-chevron-down{
    transform: rotate(-180deg);
}
.logo{
    margin-left: 30px;
}

.list{
    background-color: black;
    position: absolute;
    padding-top: 10px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 0px;
    margin-left: -50px;
    display: none;
}

.list li{
    display: block;
    margin-bottom: 10px;
    color: aliceblue;
}

.nav a:hover{
color: blue;
}

.data-list a{
    text-decoration: none;
}

.isi:hover .list{
     background-color: black;
     display: block;
}

.list li:hover {
  color: blueviolet;
}

/*header======== */

.header {
    display: flex;
    background-image: url("pexels-photo-7156910.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    margin-bottom: 40px;
}

.home-header{
    
    width: 40%;
    margin: auto;
}

.home-header h1{
font-size: 4rem;
font-weight: 800;
width: 50%;
color: white;

}

.gambar{
    width: 40%;
    height: 100vh;
}

.gambar img{
    width: 600px;
    height: 600px;
    margin-top: 200px;
}

.sosmed{
    position: fixed;
    margin-top: 450px;
    margin-left: 30px;
}

.sosmed li{
    list-style: none;
    margin-bottom: 20px;
}

.sosmed .fa-instagram:hover{
    color: red;
}

.sosmed .fa-tiktok:hover{
    color: black;
}

.sosmed .fa-whatsapp:hover{
    color: green;
}

.sosmed .fa-brands{
font-size: 30px;
color: blue;
}

/* container - carddddddddd= */

.container{
  
    width: 70%;
    margin: auto;
}

/* content========== */

.content h2{
color: black;
margin-bottom: 20px;
margin-top: 40px;
}

/* footers cssss= */

.bg-footer{
    height: 20vh;
    background-color: #222;
    text-align: center;
    color: white;
    padding-top: 200px;
    margin-top: 60px;
}
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="nav">
        <div class="logo">
            <h2>Issz</h2>
        </div>
        <ul class="data-list">
            <a href="admin.php"><li>Home</li></a>
            <a href="#"><li class="isi">Isi <i class="fa-solid fa-chevron-down"></i>
                
                <ul class="list">
                <a href="keuntungan2.php"><li>Keuntungan</li></a>
                    
                    <a href="produk2.php"><li>Produk yang ditawarkan</li></a>
                </ul>
                
            </li></a>
            <a href="lokasi2.php"><li>Lokasi</li></a> 
            <a href="layanan2.php"><li>Layanan</li></a>           
            <a href="about2.php"><li>AboutMe</li></a>           
            <a href="data2.php"><li>CRUD.user</li></a>           
        </ul>
    </div>
    <!-- nav selesai -->


    <!-- header -->
<div class="header">

    <div class="sosmed">
        <ul class="sosmed-list">
        <a href="https://www.instagram.com/isluis.tra/"><li><i class="fa-brands fa-instagram"></i></li></a>
            <a href="https://www.tiktok.com/@x_xybyz?_t=8hfGCZeyWLi&_r=1"><li><i class="fa-brands fa-tiktok"></i></i></li></a>
            <a href="https://wa.me/message/GG5ORGINLZ76B1"><li><i class="fa-brands fa-whatsapp"></i></i></li></a>
        </ul>
    </div>
    
    <div class="home-header">
        <h1>Lokasi BarberShop</h1>
    </div>
    <div class="gambar">
        <img src="data:image/jpeg;base64,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" alt="">
    </div>
</div>

    <!-- header selesai -->

    <!-- container -->
 <div class="container">
    <div class="content">
        <h2>1. Taman - Sidoarjo</h2>
        <p></p>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126644.3404357141!2d112.66510228497397!3d-7.282232550292155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e520602b39a3%3A0xae1d413fe13c2b92!2sMARVELOUS%20BARBERSHOP!5e0!3m2!1sid!2sid!4v1715543416058!5m2!1sid!2sid" width="600" height="300" style="border: 10px solid #333;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    
    <div class="content">
       <h2>2. Taman - Sidoarjo</h2>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126644.3404357141!2d112.66510228497397!3d-7.282232550292155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e3a5faa58e6f%3A0x4e6a312f7e1f4522!2sIbiza%20Barbershop%20(%20taman%20)!5e0!3m2!1sid!2sid!4v1715543711873!5m2!1sid!2sid" width="600" height="300" style="border: 10px solid #333;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="content">
        <h2>3. Waru - Sidoarjo</h2>
        
 
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126644.3404357141!2d112.66510228497397!3d-7.282232550292155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e4a2634a5ad5%3A0x14e392cf54fd020f!2sMr.%20Cukur%20Barber%20Shop!5e0!3m2!1sid!2sid!4v1715543859565!5m2!1sid!2sid" width="600" height="300" style="border: 10px solid #333;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </div>

     <div class="content">
        <h2>4. Taman - Sidoarjo </h2>
       
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126644.3404357141!2d112.66510228497397!3d-7.282232550292155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e35da3a73a31%3A0xe5fab5c88f776acf!2sTom&#39;s%20Barbershop%20Wage!5e0!3m2!1sid!2sid!4v1715543920361!5m2!1sid!2sid" width="600" height="300" style="border: 10px solid #333;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

 </div>

<!-- container selesai -->

     <!-- footer -->
      <div class="bg-footer">
        <p>@2023 Louis Landing Page, All Rights Reserved</p>
      </div>

     <!-- footer selesai -->
</body>
</html>