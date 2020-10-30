<?php 
exec("python ../python/ajax_downPost.py joe_try_something 5j", $res);
//exec("python module4.py joe_try_something 3", $res);
echo json_encode($res, JSON_UNESCAPED_UNICODE);

?>