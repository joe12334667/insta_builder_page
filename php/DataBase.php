<?php
function DB(){
$hostname = 'ip';
$username = '';
$password = '';
$db_name = '';

try {
    $db = new PDO("mysql:host=" . $hostname . ";dbname=" . $db_name, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
    //echo '連線成功';
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒
    $db->query("set names utf8");
    return $db;
//    $db = null; //結束與資料庫連線
} catch (PDOException $e) {
    //error message
    echo $e->getMessage();
}
}
?>



