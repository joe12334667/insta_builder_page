<?php
session_start();
//刪除SESSION
$_SESSION["account"] = "";
$_SESSION["name"] = "";
//刪除COOKIE
if (isset($_COOKIE['google_id'])) {
    setcookie('google_id', null, -1, '/'); 
}
if (isset($_COOKIE['fb_id'])) {
    setcookie('fb_id', null, -1, '/'); 
}
header('Location: ../index.html');