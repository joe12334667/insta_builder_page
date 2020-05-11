<?php
session_start();
$_SESSION["account"] = "";
$_SESSION["name"] = "";
if (isset($_COOKIE['google_id'])) {
    setcookie('google_id', null, -1, '/'); 
}
if (isset($_COOKIE['fb_id'])) {
    setcookie('fb_id', null, -1, '/'); 
}
header('Location: ../index/index.html');