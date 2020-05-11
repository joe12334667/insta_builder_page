<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        echo $_COOKIE["google_id"];
        echo $_COOKIE["google_email"];
        echo $_COOKIE["google_name"];
        echo $_COOKIE["google_image_url"];
        echo $_COOKIE["fb_id"];
        echo $_COOKIE["fb_email"];
        echo $_COOKIE["fb_name"];
        
        setcookie("google_id", "", time() - 3600);
        setcookie("google_name", "", time() - 3600);
        setcookie("google_email", "", time() - 3600);
        setcookie("google_image_url", "", time() - 3600);
        setcookie("fb_id", "", time() - 3600);
        setcookie("fb_email", "", time() - 3600);
        setcookie("fb_name", "", time() - 3600);

        
        setcookie("123", "123456");
        echo $_COOKIE["123"];
//        setcookie("123", "123456" , time() - 3600);
        echo $_COOKIE["123"];
//        print_r($_COOKIE);
        ?>
    </body>
</html>
