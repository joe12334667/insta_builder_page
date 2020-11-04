<?php //

require '../php/DataBase.php';

session_start();


//取得GET資料

$db = DB();
$sql = "select instaaccountfollower.account_id, instaaccountfollower.fans_amount, instaaccountfollower.following_amount
		, instaaccountfollower.post_amount, instaaccountfollower.record_time
		from instabuilder.user 
		left join userinstaaccount on  userinstaaccount.user_id = user.user_id
		left join instaaccount  on instaaccount.account_id = userinstaaccount.account_id
		left join instaaccountfollower on instaaccountfollower.account_id = instaaccount.account_id
		where user.signup_email ='".$_SESSION["account"]."';";

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