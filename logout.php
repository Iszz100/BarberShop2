<?php
// Mulai sesi
session_start();

// Hapus semua data sesi
$_SESSION = array();

// Hapus cookie sesi jika ada
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Hancurkan sesi
session_destroy();

// Alihkan kembali ke halaman login atau halaman lain yang sesuai
header("location: login.php");
exit;
?>