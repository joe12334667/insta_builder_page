<!----------
test1=pink chart >10
test2=blue chart >10
test3=BBB  chart 3=>1
test4=comm chart ajax    
------------>

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
        <meta name="google-signin-client_id" content="48428020310-9hp17cjtr6crev5tvl6litg2qi8i0521.apps.googleusercontent.com">
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
        <!-- <script src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">  
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">

        <link src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css" rel="stylesheet">

        <style>

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
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a> -->
                        <!-- <div class="dropdown-divider"></div> -->
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
                            <div class="sb-sidenav-menu-heading">主頁</div>
                            <!--<a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>-->
                            <a class="nav-link" href="home.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                關於我們&產品購買
                            </a>
                            <div class="sb-sidenav-menu-heading">Instabuilder 功能</div>
                            <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>-->
                            <!----------------------------------------------------------------------------------------------------------->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts-analysis" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Instagram 分析
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts-analysis" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">貼文分析</a>
                                    <a class="nav-link" href="index.html">粉絲與追蹤者分析</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">綜合分析</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">標籤分析</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts-autopost" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                智能貼文
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts-autopost" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../smart_post/smart_post.php">自動貼文&標註標籤</a>                                    
                                </nav>
                            </div>
                            <!----------------------------------------------------------------------------------------------------------->
                            <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>-->
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>                    
                </nav>
            </div>
            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Instagram 分析</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">為您的Instagram帳戶提供精美分析</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-blue text-white mb-4">
                                    <div class="card-body" style="font-weight:bold;">貼文數量
                                        <h3 style="font-size:3rem;">
                                        <?php 
                                        $db = DB();
                                        $id = $_SESSION['account'];
                                        $sql="SELECT count(post_no) as allpost
                                        FROM instabuilder.userpost as a
                                        left join userinstaaccount as b on a.account_id = b.account_id 
                                        left join user as c on b.user_id = c.user_id 
                                        where c.signup_email = '".$_SESSION["account"]."' 
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
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">貼文相關資訊</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-indigo text-white mb-4">
                                    <div class="card-body">追蹤人數
                                        <h3 style="font-size:3rem;">
                                        <?php 
                                        $db = DB();
                                        $id = $_SESSION['account'];
                                        $sql="SELECT following_amount FROM instabuilder.instaaccountfollower as a
                                        left join userinstaaccount as b on a.account_id = b.account_id 
                                        left join user as c on b.user_id = c.user_id 
                                        where c.signup_email = '".$_SESSION["account"]."'
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
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-purple text-white mb-4">
                                    <div class="card-body">粉絲人數
                                    <h3 style="font-size:3rem;">
                                    <?php 
                                        $db = DB();
                                        $id = $_SESSION['account'];
                                        $sql="SELECT fans_amount FROM instabuilder.instaaccountfollower as a
                                        left join userinstaaccount as b on a.account_id = b.account_id 
                                        left join user as c on b.user_id = c.user_id 
                                        where c.signup_email = '".$_SESSION["account"]."'
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
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-pink text-white mb-4">
                                    <div class="card-body">總按讚數
                                        <h3 style="font-size:3rem;">
                                        <?php
                                        $db = DB();
                                        $id = $_SESSION['account'];
                                        $sql="SELECT count(a.post_no) as alllike
                                        FROM instabuilder.like as a
                                        left join userpost as b on a.post_no = b.post_no 
                                        left join userinstaaccount as c on b.account_id = c.account_id 
                                        left join user as d on c.user_id = d.user_id 
                                        where d.signup_email = '".$_SESSION["account"]."'
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
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">                        
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header" style = "font-size:1.1rem; font-weight:bold;">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        發文時機分析
                                    </div>                                    
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header" style = "font-size:1.1rem; font-weight:bold;">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        貼文按讚數
                                    </div>                                    
                                    <div class="card-body"><canvas id="TEST2" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header" style = "font-size:1.1rem; font-weight:bold;">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        貼文讚數分析(未使用instabuilder&使用instabuilder)
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header" style = "font-size:1.1rem; font-weight:bold;">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Post likes
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100" height="40"></canvas></div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        post_comment chart test4
                                    </div>
                                    <input type="number" id ="like_limit"/>
                                    <button type="button" id="like_search">查詢</button>
                                    <div class="card-body" id = "post_comment_chart">
                                    <canvas id="post_comment" width="100" height="40"></canvas>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        貼文讚數分析(未使用instabuilder&使用instabuilder)
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40%"></canvas></div>
                                </div>
                            </div> -->
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header" style = "font-size:1.3rem; font-weight:bold;">
                                <i class="fas fa-chart-area mr-1"></i>貼文案讚數分析
                                <div class="input-group" style="margin-top:-32px;margin-left:65vw;width:140px">
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
                        <div class="card mb-4">
                            <div class="card-header" style = "font-size:1.3rem; font-weight:bold;">
                                <i class="fas fa-chart-area mr-1" ></i>貼文留言數分析
                                <div class="input-group" style="margin-top:-32px;margin-left:65vw;width:140px">
                                    <input class="form-control"  id ="like_limit" type="number" placeholder="筆數" aria-label="Search" aria-describedby="basic-addon2" />
                                    <div class="input-group-append" >
                                        <button class="btn btn-primary" id="like_search" type="button">查詢</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id = "post_comment_chart">
                                <canvas id="post_comment" width="100" height="40"></canvas>
                            </div>
                        </div>
                        <!---------綜合圖表---------------------------------------------------------------------->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                貼文綜合分析
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <canvas id="TEST3" width="100" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------------------------------------------------------- -->
                        
                        <!---------以上為綜合圖表---------------------------------------------------------------------->
                        <?php
                        $db = DB();
                        $id = $_SESSION['account'];
                        $sql = "SELECT DISTINCT a.account_id,d.name,d.follow_date
                                from instabuilder.instaaccountfollower as a
                                left join userinstaaccount as b on a.account_id = b.account_id 
                                left join user as c on b.user_id = c.user_id 
                                left join followers as d on b.account_id = d.account_id
                                where c.signup_email = '".$_SESSION["account"]."' 
                                order by follow_date desc
                                ";
                        $result = $db->query($sql);
                        //"SELECT b.account_id ,c.account_name,a.post_no,count(comment_account)貼文留言數量
                        //FROM instabuilder.comment as a 
                        //join userpost as b on a.post_no = b.post_no
                        //join instaaccount as c on c.account_id = b.account_id
                        //group by post_no
                        //order by account_id,post_no"
                            ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tabketest" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>使用者編號</th>
                                                <!--<th>追蹤者</th>-->  
                                                
                                                <th>新追蹤者</th>
                                                <th>追蹤的日期</th>
                                                <!--
                                                <th>互動最高追蹤者</th>
                                                <th>是否有發布貼文</th>
                                                -->  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                //echo $_SESSION["signup_email"]; 
                                                while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                                                //PDO::FETCH_OBJ 指定取出資料的型態
                                                echo '<tr>';
                                                    echo '<td>' . $row->account_id . "</td>"
                                                    //. "<td>" . $row->fans_amount. "</td>"
                                                    . "<td>" . $row->name. "</td>"
                                                    . "<td>" . $row->follow_date. "</td>";
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
                            <div class="text-muted">NTUB InstaBuilder 2020</div>
                            <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
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
            $(document).ready( function () {
                $('#tabketest').DataTable();
            } );
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
        <!-- <script src="assets/demo/chart-test4-demo.js"></script> -->
        <!--------------------------------------------------->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
        <script src="../node_modules/chart.js/dist/Chart.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="48428020310-9hp17cjtr6crev5tvl6litg2qi8i0521.apps.googleusercontent.com">      
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
//GOOGLE 登出按鈕
//onLoad();
//signOut();
                            function signOut() {
                                var auth2 = gapi.auth2.getAuthInstance();
                                auth2.disconnect();
                                auth2.signOut().then(function () {
                                    console.log('User signed out.');
                                });
                                document.location.href = "../php/logOut.php";

                            }

                            function onLoad() {
                                gapi.load('auth2', function () {
                                    gapi.auth2.init();

                                });
                            }
        </script>

        <!------Test chart-------------------------------------------------------------------------------------------------------------------------->
        <script>

            //                ajaxChart("post_like", "like");
            ajaxChart("post_comment", "comment");

            $("#like_search").click(function () {
                var limit = document.getElementById("like_limit").value;
                //                    alert(limit);
                if (limit < 1) {
                    limit = 1;
                } else if (limit > 50) {
                    limit = 50;
                }
                // ajaxChart("post_like", "like", limit);
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
                                        borderColor: "#007bff", // 設定線的顏色
                                        backgroundColor: Background_color, // 設定點的顏色
                                        pointBorderWidth: 6,

                                        //pointBorderColor: "#FF82B4",
                                        //lineTension: 0.1  // 顯示折線圖，不使用曲線
                                    }],

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
        <!--------------------------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------post_like_chart------------------------------------------------------------------------>
        <script>
            ajaxChart("post_like", "like");

            $("#like_search").click(function () {
                var limit = document.getElementById("like_limit").value;
                //                    alert(limit);
                if (limit < 1) {
                    limit = 1;
                } else if (limit > 50) {
                    limit = 50;
                }
                ajaxChart("post_like", "like", limit);

            });

            function ajaxChart(ChartName, ChartTableName, limits = 10) {

                $('#' + ChartName).remove(); // this is my <canvas> element
                $('#' + ChartName + '_chart').append('<canvas id="' + ChartName + '"><canvas>');
                $("#" + ChartName).width(100).height(40);

                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "AjaxLike.php",
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
                                        borderColor: "#007bff", // 設定線的顏色
                                        backgroundColor: Background_color, // 設定點的顏色
                                        pointBorderWidth: 6,
                                        //pointBorderColor: "#FF82B4",
                                        //lineTension: 0.1  // 顯示折線圖，不使用曲線
                                    }],

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
        <!--------------------------------------------------------------------------------------------------------------------------------------->   
    </body>
</html>
