<?php 
$res = shell_exec("/usr/bin/python3 ajax_downUserINFO.py");
$res = shell_exec("pwd");
//echo json_encode($res, JSON_UNESCAPED_UNICODE);
var_dump($res);
$res = shell_exec("ls");
var_dump($res);
//exec("python module4.py joe_try_something 3", $res);
//echo json_encode($res, JSON_UNESCAPED_UNICODE);

?>