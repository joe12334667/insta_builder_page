<?php 
$res = shell_exec("/usr/bin/python3 /home/bitnami/htdocs/insta_builder_page/python/ajax_downUserINFO.py");
//exec("python module4.py joe_try_something 3", $res);
echo json_encode($res, JSON_UNESCAPED_UNICODE);

?>