<?php

$user_name = $_POST['user_name'];
exec("python3 ../python/ajax_downPost.py ".$user_name." 20", $res);
//exec("python module4.py joe_try_something 3", $res);
echo json_encode($res, JSON_UNESCAPED_UNICODE);
?>