<!DOCTYPE html>
<?php
session_start();
include '../php/FindOrder.php';
if ($_SESSION["account"] == "") {
    header('Location: ../login/login.php');
    $_SESSION["unLog"] = true;
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!--GOOGLE SIGNOUT-->
        <meta name="google-signin-client_id" content="48428020310-lh0fm5ch27hfpjurv55ico6o8i6n8of7.apps.googleusercontent.com">
        <meta name="google-signin-client_id" content="48428020310-9hp17cjtr6crev5tvl6litg2qi8i0521.apps.googleusercontent.com">
        <meta name="google-signin-client_id" content="48428020310-9hp17cjtr6crev5tvl6litg2qi8i0521.apps.googleusercontent.com">
        <meta name="google-signin-client_id" content="815491116462-0ooiteovcl08la9u5t4mik8sj9nsepct.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
        <meta name="google-signin-scope" content="profile email">
        <!------------>        
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="../images/logo-rainbow.png"  rel="icon">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">  
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
        <link src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css" rel="stylesheet">
        <script type="text/javascript" src="../wordcloud/jquery.wordcloud.js"></script>
        <script type="text/javascript" src="../node_modules/wordcloud/src/wordcloud2.js"></script>
        <style>            
            .blue-border-focus .form-control:focus {
                border: 1px solid #007ad1;
                box-shadow: 0 0 0 0.2rem rgba(0, 120, 210, .25);
            }
            .content_search_button,
            .submit_hashtag
            {
                height:35px;
                border: 1px solid #ffffff;
                color:#007ad1;
                border-radius:0.25rem;
                float:right;
            }
            #category{
                height:35px;
                border: 1px solid rgba(0, 0, 0, 0.5);
                color:#000000;
                border-radius:0.25rem;
            }
            .text_style{
                /* margin-top:20px;
                margin-left:50px; */
                margin:20px 0 20px 0;
                background:rgba(0, 120, 210, .125);
                border-radius:0.23rem;
            }

        </style>
    </head>
    <?php
    if (isset($_SESSION["freeUser"])) {
        if ($_SESSION["freeUser"]) {
            echo '<script>  
                alert("請聯繫內部人員做升級動作");
            </script>';
            unset($_SESSION["freeUser"]);
        }
    }
    ?>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.html">Instabuilder</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">            
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a>&nbsp &nbsp&nbsp&nbsp<?php echo $_SESSION["name"]; ?> - 登出</a><a class="dropdown-item" href="#" onclick="signOut();" name="logout" >Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading" style="color:#ffffff;font-size:1rem;"><?php echo $_SESSION["name"]; ?>&nbsp歡迎使用</div>
                            <div class="sb-sidenav-menu-heading">Instabuilder 功能</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts-analysis" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Instagram 分析
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts-analysis" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#one">貼文分析</a>
                                    <a class="nav-link" href="#three">粉絲分析</a>
                                    <a class="nav-link" href="#wc">標籤分析</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts-autopost" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                智慧貼文
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts-autopost" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../smart_post/smart_post.php">自動貼文&標註標籤</a>                                    
                                </nav>
                            </div>                            
                        </div>
                    </div>                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div id="one" class="container-fluid">
                        <h1 class="mt-4">Instagram 分析</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">為您的Instagram帳戶提供精美分析</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-blue text-white mb-4">
                                    <div class="card-body" >貼文數量
                                        <h3 style="font-size:2rem;">
                                            <?php
                                            $db = DB();
                                            $id = $_SESSION['account'];
                                            $sql = "SELECT count(post_no) as allpost
                                        FROM instabuilder.userpost as a
                                        left join userinstaaccount as b on a.account_id = b.account_id 
                                        left join user as c on b.user_id = c.user_id 
                                        where c.signup_email = '" . $_SESSION["account"] . "' 
                                        group by a.account_id 
                                        ";
                                            $result = $db->query($sql);
                                            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                echo '<td>' . $row->allpost . "</td>";
                                                //. "<td>" . $row->貼文留言數量 . "</td>";
                                                echo '</tr>';
                                            }
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-indigo text-white mb-4">
                                    <div class="card-body">追蹤人數
                                        <h3 style="font-size:2rem;">
                                            <?php
                                            $sql = "SELECT following_amount FROM instabuilder.instaaccountfollower as a
                                        left join userinstaaccount as b on a.account_id = b.account_id 
                                        left join user as c on b.user_id = c.user_id 
                                        where c.signup_email = '" . $_SESSION["account"] . "'
                                        order by a.record_time desc
                                        limit 1
                                        ";
                                            $result = $db->query($sql);
                                            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                echo '<td>' . $row->following_amount . "</td>";
                                                //. "<td>" . $row->貼文留言數量 . "</td>";

                                                echo '</tr>';
                                            }
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-purple text-white mb-4">
                                    <div class="card-body">粉絲人數
                                        <h3 style="font-size:2rem;">
                                            <?php
                                            $sql = "SELECT fans_amount FROM instabuilder.instaaccountfollower as a
                                        left join userinstaaccount as b on a.account_id = b.account_id 
                                        left join user as c on b.user_id = c.user_id 
                                        where c.signup_email = '" . $_SESSION["account"] . "'
                                        order by a.record_time desc
                                        limit 1
                                        ";
                                            $result = $db->query($sql);
                                            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                echo '<td>' . $row->fans_amount . "</td>";
                                                //. "<td>" . $row->貼文留言數量 . "</td>";
                                                echo '</tr>';
                                            }
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-pink text-white mb-4">
                                    <div class="card-body">總按讚數
                                        <h3 style="font-size:2rem;">
                                            <?php
                                            $sql = "SELECT count(a.post_no) as alllike
                                        FROM instabuilder.like as a
                                        left join userpost as b on a.post_no = b.post_no 
                                        left join userinstaaccount as c on b.account_id = c.account_id 
                                        left join user as d on c.user_id = d.user_id 
                                        where d.signup_email = '" . $_SESSION["account"] . "'
                                        ";
                                            $result = $db->query($sql);
                                            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                echo '<td>' . $row->alllike . "</td>";
                                                //. "<td>" . $row->貼文留言數量 . "</td>";
                                                echo '</tr>';
                                            }
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="row">           
                        </div>
                        <!------------------------------------------貼文按讚數分析---------------------------------------------->
                        <div class="card mb-4">
                            <div class="card-header" style = "font-size:1.3rem; font-weight:bold;">
                                <i class="fas fa-chart-area mr-1"></i>貼文按讚數分析
                                <div class="input-group" style="margin-top:-32px;margin-left:55vw;width:140px">
                                    <input class="form-control"  id ="like_limit" type="number" placeholder="筆數" aria-label="Search" aria-describedby="basic-addon2"  />
                                    <div class="input-group-append" >
                                        <button class="btn btn-primary" id="like_search" type="button">查詢</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id = "post_like_chart">
                                <canvas id="post_like" width="100" height="40"></canvas>
                            </div>
                        </div>
                        <!------------------------------------------貼文留言數分析---------------------------------------------->
                        <div class="card mb-4">
                            <div class="card-header" style = "font-size:1.3rem; font-weight:bold;">
                                <i class="fas fa-chart-area mr-1" ></i>貼文留言數分析
                                <div class="input-group" style="margin-top:-32px;margin-left:55vw;width:140px">
                                    <input class="form-control"  id ="comment_limit" type="number" placeholder="筆數" aria-label="Search" aria-describedby="basic-addon2" />
                                    <div class="input-group-append" >
                                        <button class="btn btn-primary" id="comment_search" type="button">查詢</button>
                                    </div>
                                </div>
                            </div> 
                            <div class="card-body" id = "post_comment_chart">
                                <canvas id="post_comment" width="100" height="40"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 col-sm-3" >
                                <div class="card bg-blue text-white mb-4" style="border-radius: 55rem;">
                                    <div class="card-body" style="text-align:center;">總留言數
                                        <hr size="8px" text-align="center" width="100%">
                                        <h3>
                                            <?php
                                            
                                            $id = $_SESSION['account'];
                                            $sql = "SELECT count(pn_score) as allcomment from instabuilder.comment where post_no in(
                                                select post_no from instabuilder.userpost where account_id=(
                                                 select account_id from instabuilder.userinstaaccount where user_id=(
                                                  select user_id from instabuilder.user where user.signup_email = '" . $_SESSION["account"] . "' and user.user_name = '".$_SESSION["name"]."'))) 
                                            ";
                                            $result = $db->query($sql);
                                            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                echo '<td>' . $row->allcomment . "</td>";
                                                //. "<td>" . $row->貼文留言數量 . "</td>";
                                                echo '</tr>';
                                            }
                                            ?>
                                            則
                                        </h3>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3" >
                                <div class="card bg-indigo text-white mb-4" style="border-radius: 55rem;">
                                    <div class="card-body" style="text-align:center;">正向留言數
                                        <hr size="8px" text-align="center" width="100%">
                                        <h3>
                                            <?php
                                            
                                            $id = $_SESSION['account'];
                                            $sql = "SELECT count(pn_score) as positive from instabuilder.comment where post_no in(
                                                select post_no from instabuilder.userpost where account_id=(
                                                 select account_id from instabuilder.userinstaaccount where user_id=(
                                                  select user_id from instabuilder.user where user.signup_email = '" . $_SESSION["account"] . "'  and user.user_name = '".$_SESSION["name"]."'))) and pn_score>0
                                            ";
                                            $result = $db->query($sql);
                                            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                echo '<td>' . $row->positive . "</td>";
                                                //. "<td>" . $row->貼文留言數量 . "</td>";
                                                echo '</tr>';
                                            }
                                            ?>
                                            則
                                        </h3>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3" >
                                <div class="card bg-purple text-white mb-4" style="border-radius: 55rem;">
                                    <div class="card-body" style="text-align:center;">負向留言數
                                        <hr size="8px" text-align="center" width="100%">
                                        <h3>
                                            <?php
                                            
                                            $id = $_SESSION['account'];
                                            $sql = "SELECT count(pn_score) as negative from instabuilder.comment where post_no in(
                                                select post_no from instabuilder.userpost where account_id=(
                                                 select account_id from instabuilder.userinstaaccount where user_id=(
                                                  select user_id from instabuilder.user where user.signup_email = '" . $_SESSION["account"] . "'  and user.user_name = '".$_SESSION["name"]."'))) and pn_score<0
                                            ";
                                            $result = $db->query($sql);
                                            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                echo '<td>' . $row->negative . "</td>";
                                                //. "<td>" . $row->貼文留言數量 . "</td>";
                                                echo '</tr>';
                                            }
                                            ?>
                                            則
                                        </h3>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3" >
                                <div class="card bg-pink text-white mb-4" style="border-radius: 55rem;">
                                    <div class="card-body" style="text-align:center;">中向留言數
                                        <hr size="8px" text-align="center" width="100%">
                                        <h3>
                                            <?php
                                            
                                            $id = $_SESSION['account'];
                                            $sql = "SELECT count(pn_score) as medium from instabuilder.comment where post_no in(
                                                select post_no from instabuilder.userpost where account_id=(
                                                 select account_id from instabuilder.userinstaaccount where user_id=(
                                                  select user_id from instabuilder.user where user.signup_email = '" . $_SESSION["account"] . "'  and user.user_name = '".$_SESSION["name"]."'))) and pn_score=0
                                            ";
                                            $result = $db->query($sql);
                                            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                echo '<td>' . $row->medium . "</td>";
                                                //. "<td>" . $row->貼文留言數量 . "</td>";
                                                echo '</tr>';
                                            }
                                            ?>
                                            則
                                        </h3>
                                    </div>                                    
                                </div>
                            </div>  
                            </div>            
                            <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">貼心小提醒:正負向分析讓您對粉絲的留言情勢更加了解!</li>
                            </ol> 
                        <!------------------------------------------貼文綜合分析---------------------------------------------->
                        <div class="card mb-4">
                            <div class="card-header" style = "font-size:1.3rem; font-weight:bold;">
                                <i class="fas fa-chart-area mr-1"></i>貼文綜合分析
                                <div class="input-group" style="margin-top:-32px;margin-left:55vw;width:140px">
                                    <input class="form-control"  id ="sum_limit" type="number" placeholder="筆數" aria-label="Search" aria-describedby="basic-addon2"  />
                                    <div class="input-group-append" >
                                        <button class="btn btn-primary" id="sum_search" type="button">查詢</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id = "post_sum_chart">
                                <canvas id="post_sum" width="100" height="40"></canvas>
                            </div>
                            
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">貼心小提醒:可將貼文按讚數與留言數較高的貼文作為下次發文的參考範本喔!</li>
                        </ol> 
                        <!--<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                留言正負向分析
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tabketest" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>                                                
                                                <th>總留言數</th>
                                                <th>正向留言</th>
                                                <th>負向留言</th>
                                                <th>中性留言</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>              
                                                <?php
                                                /*
                                                $id = $_SESSION['account'];
                                                $sql = "SELECT count(pn_score) as allcomment from instabuilder.comment where post_no in(
                                                    select post_no from instabuilder.userpost where account_id=(
                                                     select account_id from instabuilder.userinstaaccount where user_id=(
                                                      select user_id from instabuilder.user where user.signup_email = '" . $_SESSION["account"] . "'))) 
                                                ";
                                                $sql = "SELECT count(pn_score) as positive from instabuilder.comment where post_no in(
                                                    select post_no from instabuilder.userpost where account_id=(
                                                     select account_id from instabuilder.userinstaaccount where user_id=(
                                                      select user_id from instabuilder.user where user.signup_email = '" . $_SESSION["account"] . "'))) and pn_score>0;
                                                ";
                                                $sql = "SELECT count(pn_score) as negativet from instabuilder.comment where post_no in(
                                                    ​​select post_no from instabuilder.userpost where account_id=(
                                                    ​​​select account_id from instabuilder.userinstaaccount where user_id=(
                                                    ​​​​select user_id from instabuilder.user where user.signup_email = '" . $_SESSION["account"] . "'))) and pn_score<0
                                                ";
                                                $sql = "SELECT count(pn_score) as medium from instabuilder.comment where post_no in(
                                                    ​​select post_no from instabuilder.userpost where account_id=(
                                                    ​​​select account_id from instabuilder.userinstaaccount where user_id=(
                                                    ​​​​select user_id from instabuilder.user where user.signup_email = '" . $_SESSION["account"] . "'))) and pn_score=0
                                                ";
                                                $result = $db->query($sql);
                                                while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                    //PDO::FETCH_OBJ 指定取出資料的型態
                                                    echo '<tr>';
                                                    echo '<td>'. $row->allcomment . "</td>"
                                                    . "<td>" . $row->positive. "</td>"
                                                    . "<td>" . $row->positive. "</td>"
                                                    . "<td>" . $row->positive . "</td>";
                                                    //. "<td>" . $row->貼文留言數量 . "</td>";
                                                    echo '</tr>';
                                                }*/
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->
                        
                        <div class="row">
                            <div class="col-xs-6 col-sm-6" >
                                <div class="card bg-blue text-white mb-4" style="border-radius: 55rem;">
                                    <div class="card-body" style="text-align:center;">按讚成長率
                                        <hr size="8px" text-align="center" width="100%">
                                        <h3>
                                            <?php
                                            
                                            $id = $_SESSION['account'];
                                            $sql = "SELECT before_all.user_id, before_like_avg, after_like_avg , round(after_like_avg/before_like_avg,2) as '按讚成長率' from
                                            (
                                             select temp_post_before.user_id, like_num/post_num as before_like_avg from 
                                             (
                                              select user.user_id, count(*) as post_num FROM instabuilder.user 
                                              left join instabuilder.userinstaaccount on user.user_id = userinstaaccount.user_id
                                              left join instabuilder.userpost on userinstaaccount.account_id = userpost.account_id
                                              left join instabuilder.post on userpost.post_no = post.post_no                                              
                                              where post.announce_time <= user.signup_datetime and user.signup_email = '" . $_SESSION["account"] . "'
                                              group by user_id
                                             ) as temp_post_before                                             
                                             left join                                             
                                             (
                                              select user.user_id, count(*) as like_num FROM instabuilder.user 
                                              left join instabuilder.userinstaaccount on user.user_id = userinstaaccount.user_id
                                              left join instabuilder.userpost on userinstaaccount.account_id = userpost.account_id
                                              left join instabuilder.post on userpost.post_no = post.post_no
                                              left join instabuilder.like on like.post_no = post.post_no                                              
                                              where post.announce_time <= user.signup_datetime and user.signup_email = '" . $_SESSION["account"] . "'
                                              group by user_id
                                             ) as temp_like_before                                             
                                             on temp_post_before.user_id = temp_like_before.user_id
                                            ) as before_all                                            
                                            left join                                            
                                            (
                                             select temp_post_after.user_id, like_num/post_num as after_like_avg from 
                                             (
                                              select user.user_id, count(*) as post_num FROM instabuilder.user 
                                              left join instabuilder.userinstaaccount on user.user_id = userinstaaccount.user_id
                                              left join instabuilder.userpost on userinstaaccount.account_id = userpost.account_id
                                              left join instabuilder.post on userpost.post_no = post.post_no                                              
                                              where post.announce_time >= user.signup_datetime and user.signup_email = '" . $_SESSION["account"] . "'
                                              group by user_id
                                             ) as temp_post_after                                             
                                             left join                                             
                                             (
                                              select user.user_id, count(*) as like_num FROM instabuilder.user 
                                              left join instabuilder.userinstaaccount on user.user_id = userinstaaccount.user_id
                                              left join instabuilder.userpost on userinstaaccount.account_id = userpost.account_id
                                              left join instabuilder.post on userpost.post_no = post.post_no
                                              left join instabuilder.like on like.post_no = post.post_no                                              
                                              where post.announce_time >= user.signup_datetime and user.signup_email = '" . $_SESSION["account"] . "'
                                              group by user_id
                                             ) as temp_like_after                                             
                                             on temp_post_after.user_id = temp_like_after.user_id
                                            ) as after_all
                                            on before_all.user_id = after_all.user_id
                                                    ";
                                            $result = $db->query($sql);
                                            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                echo '<td>' . $row->按讚成長率 . "</td>";
                                                //. "<td>" . $row->貼文留言數量 . "</td>";
                                                echo '</tr>';
                                            }
                                            ?>
                                            %
                                        </h3>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="card bg-indigo text-white mb-4" style="border-radius: 55rem;">
                                    <div class="card-body" style="text-align:center;">留言成長率
                                        <hr size="8px" text-align="center" width="100%">
                                        <h3>
                                            <?php
                                            
                                            $id = $_SESSION['account'];
                                            $sql = "SELECT before_all.user_id, before_comment_avg, after_comment_avg , round(after_comment_avg/before_comment_avg,2) as '留言成長率' from
                                            (
                                             select temp_post_before.user_id, comment_num/post_num as before_comment_avg from 
                                             (
                                              select user.user_id, count(*) as post_num FROM instabuilder.user 
                                              left join instabuilder.userinstaaccount on user.user_id = userinstaaccount.user_id
                                              left join instabuilder.userpost on userinstaaccount.account_id = userpost.account_id
                                              left join instabuilder.post on userpost.post_no = post.post_no
                                              
                                              where post.announce_time <= user.signup_datetime and user.signup_email = '" . $_SESSION["account"] . "'
                                              group by user_id
                                             ) as temp_post_before
                                             
                                             left join
                                             
                                             (
                                              select user.user_id, count(*) as comment_num FROM instabuilder.user 
                                              left join instabuilder.userinstaaccount on user.user_id = userinstaaccount.user_id
                                              left join instabuilder.userpost on userinstaaccount.account_id = userpost.account_id
                                              left join instabuilder.post on userpost.post_no = post.post_no
                                              left join instabuilder.comment on comment.post_no = post.post_no
                                              
                                              where post.announce_time <= user.signup_datetime and user.signup_email = '" . $_SESSION["account"] . "'
                                              group by user_id
                                             ) as temp_comment_before
                                             
                                             on temp_post_before.user_id = temp_comment_before.user_id
                                            ) as before_all
                                            
                                            left join
                                            
                                            
                                            (
                                             select temp_post_after.user_id, comment_num/post_num as after_comment_avg from 
                                             (
                                              select user.user_id, count(*) as post_num FROM instabuilder.user 
                                              left join instabuilder.userinstaaccount on user.user_id = userinstaaccount.user_id
                                              left join instabuilder.userpost on userinstaaccount.account_id = userpost.account_id
                                              left join instabuilder.post on userpost.post_no = post.post_no
                                              
                                              where post.announce_time >= user.signup_datetime and user.signup_email = '" . $_SESSION["account"] . "'
                                              group by user_id
                                             ) as temp_post_after
                                             
                                             left join
                                             
                                             (
                                              select user.user_id, count(*) as comment_num FROM instabuilder.user 
                                              left join instabuilder.userinstaaccount on user.user_id = userinstaaccount.user_id
                                              left join instabuilder.userpost on userinstaaccount.account_id = userpost.account_id
                                              left join instabuilder.post on userpost.post_no = post.post_no
                                              left join instabuilder.comment on comment.post_no = post.post_no
                                              
                                              where post.announce_time >= user.signup_datetime and user.signup_email = '" . $_SESSION["account"] . "'
                                              group by user_id
                                             ) as temp_comment_after
                                             
                                             on temp_post_after.user_id = temp_comment_after.user_id
                                            ) as after_all
                                            on before_all.user_id = after_all.user_id
                                                    ";
                                            $result = $db->query($sql);
                                            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                echo '<td>' . $row->留言成長率 . "</td>";
                                                //. "<td>" . $row->貼文留言數量 . "</td>";
                                                echo '</tr>';
                                            }
                                            ?>
                                            %
                                        </h3>
                                    </div>                                    
                                </div>
                            </div>                            
                        </div>
                        <!---------文字雲---------------------------------------------------------------------->                    
                        <div id="wc"class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Hashtag文字雲
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">                                
                                    <div class="12u$">
                                        <div class="select-wrapper">
                                            <select name="category" id="category" onchange = "ajax_word_cloud()" >
                                                <option value="0">&nbsp;- 全部hashtag類別 -&nbsp;</option>
                                                <option value="78">健康養生</option>
                                                <option value="79">動漫</option>
                                                <option value="80">國際</option>
                                                <option value="81">娛樂</option>
                                                <option value="82">家居</option>
                                                <option value="83">寵物</option>

                                                <option value="84">情感</option>
                                                <option value="85">搞笑</option>
                                                <option value="86">教育</option>
                                                <option value="87">旅遊</option>

                                                <option value="88">文化</option>
                                                <option value="89">歷史</option>
                                                <option value="90">汽車</option>
                                                <option value="91">星座運勢</option>

                                                <option value="92">社會</option>
                                                <option value="93">科技</option>
                                                <option value="94">育兒</option>
                                                <option value="95">財經</option>

                                                <option value="96">時事</option>
                                                <option value="97">時尚</option>
                                                <option value="98">遊戲</option>
                                                <option value="99">綜合</option>

                                                <option value="100">美食</option>
                                                <option value="101">音樂</option>
                                                <option value="102">體育</option>
                                                <option value="103">軍事</option>
                                            </select>
                                        </div>
                                    </div>                                    
                                    <div class="card-body" id = "word-cloud" >
                                        <div id="word_cloud_chart" align="center">
                                            <canvas id="word_cloud" width="1000px" height="400px"  ></canvas>
                                        </div>

                                    </div>   
                                </div>
                            </div>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">貼心小提醒:多多使用熱門Hashtags提升貼文的曝光度吧!</li>
                        </ol> 
                        <!------------------------------------------粉絲人數追蹤---------------------------------------------->
                        <div id="three"class="card mb-4">
                            <div class="card-header" style = "font-size:1.3rem; font-weight:bold;">
                                <i class="fas fa-chart-area mr-1" ></i>粉絲人數追蹤
                                <div class="input-group" style="margin-top:-32px;margin-left:55vw;width:140px">
                                    <input class="form-control"  id ="follower_limit" type="number" placeholder="筆數" aria-label="Search" aria-describedby="basic-addon2" />
                                    <div class="input-group-append" >
                                        <button class="btn btn-primary" id="follower_search" type="button">查詢</button>
                                    </div>
                            </div>
                            <div class="card-body" id = "user_follower_chart">
                                <canvas id="user_follower" width="100" height="40"></canvas>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT DISTINCT d.name,d.follow_date
                                from instabuilder.instaaccountfollower as a
                                left join userinstaaccount as b on a.account_id = b.account_id 
                                left join user as c on b.user_id = c.user_id 
                                left join followers as d on b.account_id = d.account_id
                                where c.signup_email = '" . $_SESSION["account"] . "' 
                                order by follow_date desc limit 10
                                ";
                        $result = $db->query($sql);
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                TOP 10 新追蹤者
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tabketest" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>新追蹤者</th>
                                                <th>追蹤的日期</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                //echo $_SESSION["signup_email"]; 
                                                while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                    //PDO::FETCH_OBJ 指定取出資料的型態
                                                    echo '<tr>';
                                                    echo '<td>'
                                                    //echo '<td>' . $row->account_id . "</td>"
                                                    //. "<td>" . $row->fans_amount. "</td>"
                                                    . $row->name . "</td>"
                                                    . "<td>" . $row->follow_date . "</td>";
                                                    //. "<td>" . $row->貼文留言數量 . "</td>";
                                                    echo '</tr>';
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>    
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"> InstaBuilder 2020</div>
                            <div class="text-muted">NTUB InstaBuilder 2020</div>                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- -------------------------tabletest------------------------ -->
        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#tabketest').DataTable();
            });
        </script>
        <!-- -------------------------------------------------------- -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
        <!------------ajax & demo-chart--------------------------------->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
        <script src="assets/demo/chart-test1-demo.js"></script>
        <script src="assets/demo/chart-test2-demo.js"></script>
        <script src="assets/demo/chart-test3-demo.js"></script>
        <script src="Table.js"></script>
        <!--------------------------------------------------->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
        <script src="../node_modules/chart.js/dist/Chart.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-scope" content="profile email">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript" src="../node_modules/wordcloud/src/wordcloud2.js"></script>
        <script>
//GOOGLE 登出按鈕
//onLoad();
//signOut();
            function signOut() {
                try {
                // 需要測試的語句
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.disconnect();
                    auth2.signOut().then(function () {
                        console.log('User signed out.');
                    });
                }
                catch (e) {
                    console.log(e);
                }
                
                document.location.href = "../php/logOut.php";

            }

            function onLoad() {
                gapi.load('auth2', function () {
                    gapi.auth2.init();

                });
            }
        </script>
        <!------留言圖表------------------------------------------------------------------------------------------------------------------->
        <script>
            ajaxChart("post_comment", "comment");
            $("#comment_search").click(function () {
                var limit = document.getElementById("comment_limit").value;
                if (limit < 1) {
                    limit = 1;
                } else if (limit > 50) {
                    limit = 50;
                }
                ajaxChart("post_comment", "comment", limit);
            });
            function ajaxChart(ChartName, ChartTableName, limits = 10) {
                $('#' + ChartName).remove(); // this is my <canvas> element
                $('#' + ChartName + '_chart').append('<canvas id="' + ChartName + '"><canvas>');
                $("#" + ChartName).width(100).height(40);
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "AjaxLike_Comment.php",
                    data: {
                        type: ChartTableName,
                        limit: limits,
                    },
                    dataType: "json",
                    success: function (response) {
                        //主要Chart.js繪圖區
                        const data = response; //取得.php回傳的資料
                        const all_x_labels = [], all_y_data = [], Background_color = [];
                        //利用陣列建立x,y座標
                        for (let i = 0; i < data.length; i++) {
                            if (data[i].content == null) {
                                all_x_labels[i] = data[i].announce_time;
                            } else if (data[i].content.length > 10) {
                                all_x_labels[i] = data[i].content.substr(0, 10) + "..." + "\n" + data[i].announce_time;
                            } else {
                                all_x_labels[i] = data[i].content + "\n" + data[i].announce_time;
                            }
                            all_y_data[i] = data[i].count;

                            Background_color[i] = "#007bff";
                        }
                        const ctx = document.getElementById(ChartName);
                        visualize = new Chart(ctx, {
                            type: "bar",
                            data: {
                                labels: all_x_labels, // x軸的刻度
                                datasets: [{
                                        label: ChartTableName, // 顯示該資料的標題 
                                        data: all_y_data, // y軸資料
                                        fill: false, // 不顯示底下的灰色區塊
                                        backgroundColor: "rgba(232, 62, 140,0.5)", // 設定點的顏色
                                        pointBorderWidth: 6,
                                    }],
                            },
                            options: {
                                legend: {
                                    onClick: (e) => e.stopPropagation()
                                },
                                scales: {
                                    yAxes: [{
                                            ticks: {
                                            },
                                        }],
                                    xAxes: [{
                                            ticks: {
                                                minRotation: 90
                                            },
                                        }],
                                }
                            }
                        });
                    }
                });
            }
        </script>
        <!---------------------------按讚數圖表----------------------------------------------------------------------->
        <script>
            ajaxChart("post_like", "like");

            $("#like_search").click(function () {
                var limit = document.getElementById("like_limit").value;
                if (limit < 1) {
                    limit = 1;
                } else if (limit > 50) {
                    limit = 50;
                }
                ajaxChart("post_like", "like", limit);
            });
        </script>
        <!----------粉絲圖表---------------------------------------------------------------------------------------------------------->   
        <script>
            ajax_follower_Chart("user_follower");

            $("#follower_search").click(function () {
                var limit = document.getElementById("follower_limit").value;
                //                    alert(limit);
                if (limit < 1) {
                    limit = 1;
                } else if (limit > 50) {
                    limit = 50;
                }
                ajax_follower_Chart("user_follower", limit);

            });

            function ajax_follower_Chart(ChartName, limit = 10) {

                $('#' + ChartName).remove(); // this is my <canvas> element
                $('#' + ChartName + '_chart').append('<canvas id="' + ChartName + '"><canvas>');
                $("#" + ChartName).width(100).height(40);

                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "Ajax_fans.php",
                    data: {
                        limit: limit,
                    },
                    dataType: "json",
                    success: function (response) {
                        //主要Chart.js繪圖區
                        const data = response; //取得.php回傳的資料
                        const all_x_labels = [], all_y_data = [], Background_color = [];

                        //利用陣列建立x,y座標
                        for (let i = 0; i < data.length; i++) {
                            if (data[i].fans_amount == null) {
                                all_x_labels[i] = data[i].record_time;
                            } else if (data[i].fans_amount.length > 10) {
                                all_x_labels[i] = data[i].fans_amount.substr(0, 10) + "..." + "\n" + data[i].record_time;
                            } else {
                                all_x_labels[i] = data[i].fans_amount + "\n" + data[i].record_time;
                            }
                            all_y_data[i] = data[i].fans_amount;

                            Background_color[i] = "#007bff";
                        }
                        const ctx = document.getElementById(ChartName);
                        visualize = new Chart(ctx, {
                            type: "line",
                            data: {
                                labels: all_x_labels, // x軸的刻度
                                datasets: [{
                                        label: "fans_amount per day", // 顯示該資料的標題 
                                        data: all_y_data, // y軸資料
                                        fill: true, // 不顯示底下的灰色區塊
                                        borderColor: "#c8ec83", // 設定線的顏色
                                        backgroundColor: Background_color, // 設定點的顏色
                                        backgroundColor: "rgba(232, 62, 140,0.2)",
                                        borderColor: "#e83e8c",
                                        pointRadius: 5,
                                        pointBackgroundColor: "#e83e8c",
                                        pointBorderColor: "rgba(255,255,255,0.8)",
                                        pointHoverRadius: 5,
                                        pointHoverBackgroundColor: "#e83e8c",
                                        pointHitRadius: 50,
                                        pointBorderWidth: 2,
                                    }],
                            },
                            options: {
                                legend: {
                                    onClick: (e) => e.stopPropagation()
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {                                  
                                            maxTicksLimit: 5,
                                            stepSize: 1
                                        },
                                    }],
                                    xAxes: [{
                                        ticks: {
                                            minRotation: 90,
                                        },
                                    }],
                                }
                            }
                        });
                    }
                });
            }
        </script>
        <script>
            ajaxSumChart("post_sum");
            $("#sum_search").click(function () {
                var limit = document.getElementById("sum_limit").value;
                if (limit < 1) {
                    limit = 1;
                } else if (limit > 50) {
                    limit = 50;
                }
                ajaxSumChart("post_sum", limit);
            });
            function ajaxSumChart(ChartName, limit = 10) {
                $('#' + ChartName).remove(); // this is my <canvas> element
                $('#' + ChartName + '_chart').append('<canvas id="' + ChartName + '"><canvas>');
                $("#" + ChartName).width(100).height(40);
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "Ajax_sum.php",
                    data: {
                        limit: limit,
                    },
                    dataType: "json",
                    success: function (response) {
                        //主要Chart.js繪圖區
                        const data = response; //取得.php回傳的資料
                        const all_x_labels = [], all_y_data_comment = [], all_y_data_like = [], Background_color = [];
                        //利用陣列建立x,y座標
                        for (let i = 0; i < data.length; i++) {
                            if (data[i].content == null) {
                                all_x_labels[i] = data[i].announce_time;
                            } else if (data[i].content.length > 10) {
                                all_x_labels[i] = data[i].content.substr(0, 10) + "..." + "\n" + data[i].announce_time;
                            } else {
                                all_x_labels[i] = data[i].content + "\n" + data[i].announce_time;
                            }
                            all_y_data_comment[i] = data[i].comment_count;
                            all_y_data_like[i] = data[i].like_count;
                            Background_color[i] = "#007bff";
                        }
                        const all_y_data = [
                            {
                                label: "按讚數",
                                backgroundColor: "rgba(0, 123, 255,0.6)",
                                data: all_y_data_like
                            },
                            {
                                label: "留言數",
                                backgroundColor: "rgba(57,2,160,0.6)",
                                data: all_y_data_comment
                            }
                        ];
                        const ctx = document.getElementById(ChartName);
                        visualize = new Chart(ctx, {
                            type: "bar",
                            data: {
                                labels: all_x_labels, // x軸的刻度
                                datasets: all_y_data,
                            },
                            options: {
                                legend: {
                                    onClick: (e) => e.stopPropagation()
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            // beginAtZero: true,
                                            //min: 10,
                                            //stepSize: 2
                                        },
                                    }],
                                    xAxes: [{
                                        ticks: {
                                            minRotation: 90,
                                            // beginAtZero: true,
                                            //min: 10,
                                            //maxTicksLimit: 10,
                                        },
                                    }],
                                }
                            }
                        });
                    }
                });
            }
        </script>
        <!---------文字雲---------------------------------------------------------------------->
        <script>
            ajax_word_cloud()
            function ajax_word_cloud() {
                cate_no = document.getElementById("category").value;

                ChartName = "word_could"
                $('#' + ChartName).remove(); // this is my <canvas> element
                $('#' + ChartName + '_chart').append('<canvas id="' + ChartName + '"><canvas>');
                $("#" + ChartName).width(100).height(40);
                var wordFreqData = new Array();
                var x = 0;
                var weight = 0;
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "../php/Ajax_wordcloud.php",
                    data: {
                        cate_no: cate_no
                    },
                    dataType: "json",
                    success: function (response) {

                        response.forEach(function (item, index, array) {
                            if ( x == 0){
                                weight = parseInt(item["times"]);
                                console.log(parseInt(item["times"]));
                                console.log(100/weight);
                                
                            }
                            x++;
                            var option = ["#" + item["hash_name"], parseInt(item["times"])];
                            wordFreqData.push(option);
                        });

                        var canvas = document.getElementById('word_cloud');
                        var options = eval({

                            "list": wordFreqData, //或者[['各位观众',45],['词云', 21],['来啦!!!',13]],只要格式满足这样都可以
                            "gridSize": 10, // size of the grid in pixels
                            "weightFactor": 100 / weight, // number to multiply for size of each word in the list
                            "maxFontSize": 50, //最大字号
                            "minFontSize": 10,
                            "fontWeight": 'bold', // 'normal', 'bold' or a callback
                            "fontFamily": 'El Messiri, sans-serif', // font to use
                            "color": 'purple', // 'random-dark' or 'random-light'
                            // "backgroundColor": 'black', // the color of canvas
                            clearCanvas: true,
                            shrinkToFit: true,
                            drawOutOfBound: false,
                            wait: 3,
                            shuffle: true,
                            "rotateRatio": 0
                        });
                        //生成
                        WordCloud(canvas, options);
                    }
                });
                console.log(wordFreqData);
            }
        </script>
    </body>
</html>
