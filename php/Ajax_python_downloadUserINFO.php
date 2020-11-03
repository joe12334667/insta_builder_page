<?php 
$res =  shell_exec("/usr/bin/python3 -c \"print('hello world')\"");
//exec("python module4.py joe_try_something 3", $res);
echo json_encode($res, JSON_UNESCAPED_UNICODE);

?>