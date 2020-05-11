
<?php
session_start();
include 'FindOrder.php';
//使用GOOGLE 登入
if (isset($_COOKIE["google_id"]) ) {
    $_SESSION["account"] = $_COOKIE["google_id"];
    $_SESSION["name"] = $_COOKIE["google_name"];
    
    setcookie('google_id', null, -1, '/'); 
    header("Location: ../analyzed_post/analyzed_post.php ");
}//使用FB 登入
else if (isset ($_COOKIE["fb_id"])) {
    $_SESSION["account"] = $_COOKIE["fb_id"];
    $_SESSION["name"] = $_COOKIE['fb_name'];
    setcookie('fb_id', null, -1, '/'); 
    header("Location: ../analyzed_post/analyzed_post.php");
    //TODO 傳輸資料至資料庫
//    header('Location: ../maneger.php');
}
?>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
       
        <p>
            請稍等....
        </p>
    </body>
</html>

