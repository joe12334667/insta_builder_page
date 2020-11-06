<?php

require 'DataBase.php';

session_start();

$cate_no = $_GET['cate_no'];

//取得GET資料
//$cate_no = 78;
$db = DB();
if($cate_no == 0){
    $sql = "SELECT hash_name , times FROM instabuilder.hashtags order by times desc limit 100 offset 26 ;";
}else{
    $sql = "SELECT hash_name , times FROM instabuilder.hashtags where cate_no = ".$cate_no." order by times desc limit 100 offset 1 ;";
}

$data = $db->query($sql);
echo json_encode($data->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
