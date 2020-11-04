<?php

$user_name = $_POST['user_name'];
$res = shell_exec("/opt/bitnami/apache/htdocs/env/bin/python3 ../python/ajax_downUserFollowers.py ".$user_name, $res);
//exec("python module4.py joe_try_something 3", $res);
echo json_encode($res, JSON_UNESCAPED_UNICODE);
?>