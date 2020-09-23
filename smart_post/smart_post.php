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
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="home.html">Instabuilder</a>
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
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="signOut();" name="logout"> Logout</a><?php echo $_SESSION["name"]; ?>-登出</a>
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
                                    <a class="nav-link" href="layout-static.html">自動貼文&標註標籤</a>                                    
                                </nav>
                            </div>
                            <!----------------------------------------------------------------------------------------------------------->

                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">smart_post</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">發文及自動化hashtag</li>
                        </ol>
                        <!-- ------------------------------------------------------------------------------------------- -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                貼文內容
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">                                
                                    <textarea name="user_content" id="user_content" placeholder="在此輸入內文" rows="10"></textarea>
                                </div>
                                <div class="12u$">                                    

                                    <button type="button" id="content_search">查詢</button>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                貼文類別
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">                                
                                    <div class="12u$">
                                        <div class="select-wrapper">
                                            <select name="category" id="category" onchange = "ajaxSelect()" >
                                                <option value="0">- 選擇貼文類別 -</option>
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
                                    <div class="12u$">
                                        <!--------------------------功能------------------------------->
                                        <div class="12u$">系統前十名HASHTAG:</div>
                                        <div  class="12u$" id="system_hashtag_group">

                                        </div>
                                        <!--------------------------------------------------------->
                                        <div class="12u$">jieba分析前十名HASHTAG:</div>
                                        <div  class="12u$" id="jieba_hashtag_group">

                                        </div>
                                        <!--------------------------------------------------------->
                                    </div>    
                                    <div class="12u$">
                                        <div class="table-responsive">                                
                                            <textarea name="message" id="message" placeholder="自訂hashtag" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="12u$">
                                        <input type="submit" value="確定" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ------------------------------------------------------------------------------------------- -->
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <!------------ajax & demo-chart--------------------------------->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
        <script src="assets/demo/chart-test1-demo.js"></script>
        <script src="assets/demo/chart-test2-demo.js"></script>
        <script src="assets/demo/chart-test3-demo.js"></script>
        <!-- <script src="assets/demo/chart-test4-demo.js"></script> -->
        <!--------------------------------------------------->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
        <script src="../node_modules/chart.js/dist/Chart.js"></script>
        <script src="js/jquery.min.js"></script>
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

            function ajaxSelect() {
                var cate_no = document.getElementById("category").value;
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "ajaxSelectHashtag.php",
                    data: {
                        cate_no: cate_no,
                    },
                    dataType: "json",
                    success: function (response) {
                        $('#system_hashtags').remove();
                        $('#system_hashtag_group').append('<div id="system_hashtags"> </div>');
                        response.forEach(function (item, index, array) {
                            $('#system_hashtags').append('<input type="checkbox" id="' + item["hash_no"] + '" name=""> <label for="horns">' + item["hash_name"] + '</label>');
                        });
                    }
                });
            }

            $("#content_search").click(function () {
                var user_content = document.getElementById("user_content").value;
                var cate_no = document.getElementById("category").value;
                if (cate_no == 0) {
                    alert("請至下方選擇種類!", "error");
                }
                alert("系統計算需要時間，請等待片刻")
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "../php/Ajax_Baidu_Jieba.php",
                    data: {
                        user_content: user_content,
                        user_cate: cate_no,
                    },
                    dataType: "json",
                    beforeSend: function () {
                        // 禁用按鈕防止重復提交
                        $("#content_search").attr({disabled: "disabled"});
                    },
                    success: function (response) {
                        $('#jieba_hashtags').remove();
                        $('#jieba_hashtags_inDB').remove();
                        $('#jieba_hashtag_group').append('<div id="jieba_hashtags_inDB">在資料庫有資料的推薦HASHTAG:</div>');
                        $('#jieba_hashtag_group').append('<div id="jieba_hashtags">在資料庫無資料的推薦HASHTAG:</div>');

                        response.forEach(function (item, index, array) {
                            if (item["is_in_DB"] && item["is_same"]) {
                                $('#jieba_hashtags_inDB').append('<input type="checkbox" id="' + index + '" name=""  checked="checked"> <label for="horns">' + item["hashtag"] + '</label>');
                            } else {
                                $('#jieba_hashtags').append('<input type="checkbox" id="' + index + '" name=""> <label for="horns">' + item["hashtag"] + '</label>');
                            }
                        });
                    }, complete: function () {
                        $("#content_search").removeAttr("disabled");
                    }
                });
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

                    }
                });
            }
        </script>
        <!--------------------------------------------------------------------------------------------------------------------------------------->
    </body>
</html>