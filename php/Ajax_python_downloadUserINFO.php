<?php 
passthru("python3 ../python/ajax_downUserINFO.py", $res);
//exec("python module4.py joe_try_something 3", $res);
echo json_encode($res, JSON_UNESCAPED_UNICODE);

?>