<?php 
require '../vendor/autoload.php';
 
// Using Medoo namespace
use Medoo\Medoo;
 
$hostname = '140.131.114.143';
$username = 'root';
$password = 'superman12334667';
$db_name = 'instabuilder';
// Initialize
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => $db_name,
    'server' => $hostname,
    'username' => $username,
    'password' => $password,
    "charset" => "utf8mb4",
]);
 
// Enjoy
//$database->insert('account', [
//    'user_name' => 'foo',
//    'email' => 'foo@bar.com'
//]);
 
$data = $database->select('post', [
    'content'
], [
    
]);

// [>] == LEFT JOIN
// [<] == RIGH JOIN
// [<>] == FULL JOIN
// [><] == INNER JOIN
// 
$data = $database->select("user", [
	// Here is the table relativity argument that tells the relativity between the table you want to join.
 
	// The row author_id from table post is equal the row user_id from table account
	"[>]userinstaaccount" => "user_id",
        "[>]userpost" => "account_id",
        "[>]post"  => "post_no",
        "[>]like" => "post_no"
], [
	"user.user_id",
	"userinstaaccount.account_id",
	"userpost.post_no",
        "post.content",
	"count" => Medoo::raw('COUNT(<like.post_no>)')
], [
	"user.user_name" => "郭嘉茵",
	"GROUP" => "like.post_no"
]);
// 
// SELECT
// 	`post`.`post_id`,
// 	`post`.`title`,
// 	`account`.`city`
// FROM `post`
// LEFT JOIN `account` ON `post`.`author_id` = `account`.`user_id`
// LEFT JOIN `album` USING (`user_id`)
// LEFT JOIN `photo` USING (`user_id`, `avatar_id`)
// WHERE
// 	`post`.`user_id` = 100
// ORDER BY `post`.`post_id` DESC
// LIMIT 50


 
echo json_encode($data , JSON_UNESCAPED_UNICODE );
 
// [
//     {
//         "user_name" : "foo",
//         "email" : "foo@bar.com"
//     }
// ]
