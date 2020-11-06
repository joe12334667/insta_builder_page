<?php //

require '../php/DataBase.php';

session_start();
$limit = $_GET['limit'];

//取得GET資料

$db = DB();


$sql = "select  com.content , com.comment_count , lik.like_count , com.announce_time  from(
        select user.user_id ,  userinstaaccount.account_id  , userpost.post_no  , post.content , count(comment.post_no) as comment_count , post.announce_time FROM instabuilder.user 
        left join instabuilder.userinstaaccount on user.user_id = userinstaaccount.user_id
        left join instabuilder.userpost on userinstaaccount.account_id = userpost.account_id
        left join instabuilder.post on userpost.post_no = post.post_no
        left join instabuilder.comment on post.post_no = comment.post_no
        where user.signup_email = '". $_SESSION["account"] ."'
        group by post_no 
        order by post.announce_time desc
        limit ".$limit."
        ) as com 
        left join (
        select user.user_id ,  userinstaaccount.account_id  , userpost.post_no  , post.content , count(like.post_no) as like_count , post.announce_time FROM instabuilder.user 
        left join instabuilder.userinstaaccount on user.user_id = userinstaaccount.user_id
        left join instabuilder.userpost on userinstaaccount.account_id = userpost.account_id
        left join instabuilder.post on userpost.post_no = post.post_no
        left join instabuilder.like on post.post_no = like.post_no
        where user.signup_email = '". $_SESSION["account"] ."'
        group by post_no 
        order by post.announce_time desc
        limit ".$limit."
        ) as lik on lik.post_no = com.post_no
        order by com.announce_time; ";



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