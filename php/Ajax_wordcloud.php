<?php

require 'DataBase.php';

session_start();


//取得GET資料
//$cate_no = 78;
$db = DB();
$sql = "SELECT hash_name , times FROM instabuilder.hashtags  order by times desc limit 100 offset 26 ;";
$data = $db->query($sql);
echo json_encode($data->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
