<?php //

require '../php/DataBase.php';

session_start();
$limit = $_GET['limit'];

//取得GET資料

$db = DB();


$sql = "SELECT account_id, max(fans_amount) as fans_amount, max(following_amount) as following_amount, max(post_amount) as post_amount, CONVERT(record_time , DATE)  as record_time FROM instabuilder.instaaccountfollower
        where account_id = 
        (SELECT userinstaaccount.account_id FROM instabuilder.user
        left join userinstaaccount on user.user_id = userinstaaccount.user_id
         where signup_email = '". $_SESSION["account"] ."'
         )
        group by CONVERT(record_time , DATE) , account_id 
        order by CONVERT(record_time , DATE) asc limit ".$limit.";";



$data = $db->query($sql);



echo json_encode($data->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);

////檢查連結
//if (!$conn) {
//    die("連接失敗: " . mysqli_connect_error());
//}
////搜尋指令
//$sql = "SELECT * FROM `$Select_Post` WHERE `name` = '$Post_Name' AND `time` > '$Start_Time' AND `time` < '$End_Time'";
//$result = mysqli_query($conn, $sql);
//if (mysqli_num_rows($result) > 0) {
//    // 輸出數據
//    $row = mysqli_fetch_assoc($result);
//    while ($row = mysqli_fetch_assoc($result)) {
//        $row_array['value'] = $row['value'];
//        $row_array['time'] = $row['time'];
//        // 堆疊陣列資料
//        array_push($return_arr, $row_array);
//    }
//    //輸出JSON
//    echo json_encode($return_arr);
//} else {
//    echo "0 個查詢結果";
//}
//mysqli_close($conn);
?>