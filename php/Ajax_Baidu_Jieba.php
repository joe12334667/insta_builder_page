<?php 

//把傳入的使用者文章丟入jieba做關鍵字提取，在跟資料庫hashtag做比對，在輸出。

require_once "../vendor/autoload.php";
require 'DataBase.php';
session_start();
//----------------------------------------------- jieba -----------------------------------------------
ini_set('memory_limit', '600M');
require_once "../vendor/fukuball/jieba-php/src/vendor/multi-array/MultiArray.php";
require_once "../vendor/fukuball/jieba-php/src/vendor/multi-array/Factory/MultiArrayFactory.php";
require_once "../vendor/fukuball/jieba-php/src/class/Jieba.php";
require_once "../vendor/fukuball/jieba-php/src/class/Finalseg.php";
require_once "../vendor/fukuball/jieba-php/src/class/JiebaAnalyse.php";
use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\JiebaAnalyse;

//用戶所選的文章分類編號 / 寫的文章 
$user_content = $_POST["user_content"];
$user_cate = $_POST["user_cate"];
//$user_cate =  79;
//$user_content = "詳細的阿漆也不會講，但這次航海王與植村秀合作推出的商品，就有粉餅、口紅跟眼線筆...之類的，我覺得聯名合作跟設計弄得好的話，基本上成品會非常的吸引人，明明東西可能都一樣，沒特別加什麼配方或精靈粉末之類的，但航海王的ONE PIECE跟 SHU UEMURA的字擺在一起，排列弄整齊就是好看，另外還有魯夫等主要人物的漫畫輪廓線風格的展現，我不知道會化妝的怎麼看，但阿漆有被打中了說";
//

Jieba::init(array('mode'=>'default','dict'=>'big'));
Finalseg::init();
JiebaAnalyse::init();

$top_k = 10;
$tags = JiebaAnalyse::extractTags($user_content, $top_k);
//var_dump($tags);
//print_r($tags);
//echo json_encode($tags, JSON_UNESCAPED_UNICODE);
//echo "<br>";

$json = array();
foreach($tags as $key => $value){
//    print $key;
//    print $value;
    
    $db = DB();
    $sql = "SELECT * FROM instabuilder.hashtags where hash_name = '".$key."' ;";
    $rows = $db->query($sql);
    
    $is_in_DB = false;
    $is_same = false;
    $times = 0;
    $DB_cate_no = 0;
    foreach($rows->fetchAll(PDO::FETCH_ASSOC) as $row){
        if($user_cate == $row["cate_no"]){
            $is_in_DB  = true;
            $is_same = true;
            $times = $row["times"];
            $DB_cate_no = $row["cate_no"];
            break;
        }else{
            $is_same = false;
            $is_in_DB  = true;
        }
    }
    
    $json[] = array("hashtag" => $key , "score" => $value , "times" => $times , "DB_cate_no" => $DB_cate_no , "is_in_DB" => $is_in_DB ,"is_same" => $is_same );
//    echo json_encode($data->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
//    print "<br>";
    
}
$db = NULL;
echo json_encode($json, JSON_UNESCAPED_UNICODE);



