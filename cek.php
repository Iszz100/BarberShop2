<?php
$databaseHost = "localhost";

$databaseName = "barbershop";

$databaseUsername = "root";

$databsePassword = "";

$mysqli = mysqli_connect ($databaseHost, $databaseUsername, $databsePassword, $databaseName);
if ($mysqli){
    echo "Koneksi DB berhaasil.<br/>";
}else{
    echo "koneksi gagal.<br/>";
}
?>