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
margin-bottom: 10px;
}

.content p{
    color: black;
    line-height: 25px;
    margin-bottom: 20px;
}

.content img{
    margin-bottom: 30px;
}

/* card-profillll===== */

.content h2{
    font-size: 3rem;
}

.content p {
    font-size: 20px;
    margin-top: 20px;
    height: 10px;
    margin-bottom: 10px;
    font-weight: bold   ;
}

.card-profil h3{
    font-family: 'Times New Roman', Times, serif;
    font-size: 35px;
    margin-top: 30px;
}

.card-profil h4{
    font-family: 'Times New Roman', Times, serif;
    font-size: 20px;
    margin-top: 20px;
}

.gambar-profil img {
    width: 500px;
    height: 800px;
    margin-bottom: 50px;
    margin-top: 50px;
    margin-left: 500px;
    border-radius: 200px;
}

/* footers cssss= */

.bg-footer{
    height: 20vh;
    background-color: #222;
    text-align: center;
    color: white;
    padding-top: 200px;
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
            <a href="data2.php"><li>CRUD.data</li></a> 
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
        <h1>About Me</h1>
    </div>
    <div class="gambar">
        <img src="fotoformal.jpg" alt="">
    </div>
</div>

    <!-- header selesai -->

    <!-- container -->
 <div class="container">
    <div class="content">
        <h2>Latar Belakang</h2>
        <p>Dibuatnya website ini untuk mengetahui manfaat dan keuntungan apa saja yang didapat dari BarberShop</p>
    </div>


    <div class="card-profil">
        <div class="gambar-profil">
            <h3>Louis Fachri Putra Jatmiko</h3>
            <h4>TGL      : SURABAYA, 10 JUNI 2008</h4>
            <h4>Alamat   : Perumahan GMA - SUKODONO - MASANGAN WETAN B3/NO 22</h4>
            <h4>Sekolah  : SMK TELKOM SIDOARJO</h4>
            <h4>Kelas    : X SIJA 1</h4>
            <img src="foto.jpg" alt="">
        </div>
    </div>
 </div>

<!-- container selesai -->

     <!-- footer -->
      <div class="bg-footer">
        <p>@2023 Louis Landing Page, All Rights ReservedL</p>
      </div>

     <!-- footer selesai -->
</body>
</html>