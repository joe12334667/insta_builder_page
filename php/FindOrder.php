<?php

include 'DataBase.php';

function FindUser ($account , $password){
    $db = DB();
    $sql = "select * from user where signup_email = \"".$account."\" and login_pas = \"".$password."\"";
    
    $result = $db->query($sql);
//    $row = $result->fetch(PDO::FETCH_OBJ);
    if($row = $result->fetch(PDO::FETCH_OBJ)){
        $_SESSION["user_id"] = $row->user_id;
        $_SESSION["account"] = $account;
        $_SESSION["name"] = $row->user_name;
        $_SESSION["privilege"] =  $row->privilege;
//        $_SESSION["password"] = $password;
        
        
        header("Location: ../dashboard/dashboard.php");
    }else{
        echo '<script>  swal.fire({
            text: "查不到資料！  請檢查輸入資料是否正確！",
            icon: "error",
            button: false,
            timer: 3000,
        }); </script>';
    }

}

function logInSure(){
    if($_SESSION["account"] == ""){
        // echo '<script>  swal({
        //     text: "未登入或登入逾時！  兩秒後跳轉至登入畫面!",
        //     icon: "error",
        //     button: false,
        //     timer: 2000,
        // }); </script>';
        
        header('Location: ../maneger.php');
        $_SESSION["unLog"] = true;
        // echo '<meta http-equiv="refresh" content="2;url=../maneger.php" />';
    }

}


