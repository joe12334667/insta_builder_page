
<?php

session_start();
include 'FindOrder.php';
//使用GOOGLE 登入
if (isset($_COOKIE["google_id"])) {
    
    SendtoDB($_COOKIE["google_id"] , $_COOKIE["google_name"] , $_COOKIE["google_email"], $_COOKIE["google_image_url"]);
    
}//使用FB 登入
else if (isset($_COOKIE["fb_id"])) {
    
    SendtoDB($_COOKIE["fb_id"] , $_COOKIE["fb_name"] , $_COOKIE["fb_email"], $_COOKIE["fb_picture"]);
    
}

function SendtoDB($id , $name , $email , $url) {
    
    try{
    $db = DB();
//    $sql =  "select * from instabuilder.thirdPartyLogin where id_thirdPartyLogin = \"".$id."\";";
    $sql = "SELECT * FROM instabuilder.user where user_name = \"".$name."\" and signup_email = \"".$email."\"; ";
    //如果有資料
    $result = $db->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if ($row >= 1) {
        $_SESSION["account"] = $id;
        $_SESSION["name"] = $name;
        header('Location: ../analyzed_post/analyzed_post.php');
    } else {
        $_SESSION["account"] = $id;
        $_SESSION["name"] = $name;
        //沒有資料
        $sql = "insert into instabuilder.user (user_name, signup_date, signup_email) value ( \"".$name."\" , NOW() ,\"".$email."\") ;";
        $db->query($sql);
        $sql = "SELECT LAST_INSERT_ID() as id;";
        $user_id = $db->query($sql)->fetch(PDO::FETCH_OBJ)->id ;
        
        $sql = "insert into instabuilder.thirdPartyLogin (id_thirdPartyLogin, fullname, email, image_url, user_id) "
                . "value (\"".$id."\" , \"".$name."\" , \"".$email."\" , \"".$url."\" , \"".$user_id."\"  );";
        
        $db->query($sql);
        header('Location: ../analyzed_post/analyzed_post.php');
    }
    }catch(Exception $e){   
        echo '<script> alert("資料庫輸入錯誤 ")</script>';
        echo '<p>將於五秒轉至登入畫面</p>';
        echo $e;
//        echo '<script>document.location.href=" ../index.html";</script>';
        
    }
}
?>

