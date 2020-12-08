<!DOCTYPE html>
<?php
session_start();
include '../php/FindOrder.php';
if ($_SESSION["account"] == "") {
    header('Location: ../login/login.php');
    $_SESSION["unLog"] = true;
}
if ($_SESSION["privilege"] != 2) {
    header('Location: ../dashboard/dashboard.php');
    $_SESSION["freeUser"] = true;
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
        <link href="../images/logo-rainbow.png"  rel="icon">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
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
                            <div class="sb-sidenav-menu-heading">Instabuilder 功能</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts-analysis" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Instagram 分析
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts-analysis" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../dashboard/dashboard.php">貼文分析</a>
                                    <a class="nav-link" href="../dashboard/dashboard.php">粉絲分析</a>
                                    <a class="nav-link" href="../dashboard/dashboard.php">標籤分析</a>
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
                            <!----------------------------------------------------------------------------------------------------------->
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">智慧貼文</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">將您的貼文加上Hashtag,增加曝光度吧!</li>
                        </ol>
                        <!-- ------------------------------------------------------------------------------------------- -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                貼文內容
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">    
                                    <div class="form-group blue-border-focus">                                
                                        <textarea class="form-control" id="user_content" rows="7"></textarea>
                                    </div>                              
                                    <button class="content_search_button" type="button" id="content_search">查詢</button> 
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
                                                <option value="0">&nbsp;- 選擇貼文類別 -&nbsp;</option>
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
                                        <div class="12u$ text_style" >&nbsp;&nbsp;系統前十名HASHTAG:</div>
                                        <div  class="12u$" id="system_hashtag_group">

                                        </div>
                                        <!--------------------------------------------------------->
                                        <div class="12u$ text_style" >&nbsp;&nbsp;jieba分析前十名HASHTAG:</div>
                                        <div  class="12u$" id="jieba_hashtag_group">

                                        </div>
                                        <!--------------------------------------------------------->
                                    </div>    
                                    <div class="12u$">
                                        <div class="form-group blue-border-focus">                                
                                            <textarea name="message" class="form-control" id="user_hashtags" rows="5" placeholder="自訂hashtag"></textarea>
                                        </div>        
                                    </div>
                                    <div class="12u$">
                                        <input class="submit_hashtag" type="submit" id="copy_post" value="輸出" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                系統輸出
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">    
                                    <div class="form-group blue-border-focus">                                
                                        <textarea class="form-control" id="system_user_content" rows="10"></textarea>
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
                            <div class="text-muted">NTUB InstaBuilder 2020</div>                           
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
                        var a = 0;
                        response.forEach(function (item, index, array) {
                            if (a > 10) {
                                return false;
                            }
                            $('#system_hashtags').append('<input type="checkbox" id="system_hashtags_' + a + '_checkbox" value="' + item["hash_name"] + '"> <label for="system_hashtags_' + a + '_label">' + '&nbsp;' + item["hash_name"] + '</label>' + '&nbsp;&nbsp;');
                            a++;
                        });
                    }
                });
            }
            $("#content_search").click(function () {
                var user_content = document.getElementById("user_content").value;
                var cate_no = document.getElementById("category").value;
                if (cate_no == 0) {
                    alert("請至下方選擇種類!", "error");
                } else {
                    alert("系統計算需要時間，請等待片刻")
                    $.ajax({
                        type: "POST",
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
                            $('#jieba_hashtag_group').append('<div id="jieba_hashtags_inDB">在資料庫有資料的推薦HASHTAG&nbsp;:&nbsp;&nbsp;</div>');
                            $('#jieba_hashtag_group').append('<div id="jieba_hashtags">在資料庫無資料的推薦HASHTAG&nbsp;:&nbsp;&nbsp;</div>');
                            var i = 0;
                            var x = 0;
                            response.forEach(function (item, index, array) {
                                if (item["is_in_DB"] && item["is_same"]) {
                                    if (i > 10) {
                                        return false;
                                    }
                                    $('#jieba_hashtags_inDB').append('<input type="checkbox" id="jieba_hashtags_inDB_' + i + '" value="' + item["hashtag"] + '"  checked="checked"> <label for="horns">' + '&nbsp;' + item["hashtag"] + '</label>' + '&nbsp;&nbsp;');
                                    i++;
                                } else {
                                    if (x > 10) {
                                        return false;
                                    }
                                    $('#jieba_hashtags').append('<input type="checkbox" id="jieba_hashtags_' + x + '" value="' + item["hashtag"] + '"> <label for="horns">' + '&nbsp;' + item["hashtag"] + '</label>' + '&nbsp;&nbsp;');
                                    x++;
                                }
                            });
                        }, complete: function () {
                            $("#content_search").removeAttr("disabled");
                        }
                    });
                }
            });
            $("#copy_post").click(function () {
                console.log("copy_post");
                var post = "";
                var user_content = document.getElementById("user_content").value;
                post += user_content + '\n';
                var user_content = document.getElementById("user_hashtags").value;
                post += user_content + " ";
                //system_hashtags_
                for (var a = 0; a < 10; a++) {
                    if (document.getElementById('system_hashtags_' + a + "_checkbox")) {
                        if (document.getElementById('system_hashtags_' + a + "_checkbox").checked) {
                            post += "#" + document.getElementById("system_hashtags_" + a + "_checkbox").value + " ";
                        }
                    }
                }
                //jieba_hashtags_inDB_
                for (var a = 0; a < 10; a++) {
                    if (document.getElementById('jieba_hashtags_inDB_' + a)) {
                        if (document.getElementById('jieba_hashtags_inDB_' + a).checked) {
                            post += "#" + document.getElementById('jieba_hashtags_inDB_' + a).value + " ";
                        }
                    }
                }
                //jieba_hashtags_
                for (var a = 0; a < 10; a++) {
                    if (document.getElementById('jieba_hashtags_' + a)) {
                        if (document.getElementById('jieba_hashtags_' + a).checked) {
                            post += "#" + document.getElementById('jieba_hashtags_' + a).value + " ";
                        }
                    }
                }
                var clip_area = document.createElement('textarea');
                clip_area.textContent = post;
                document.body.appendChild(clip_area);
                clip_area.select();
                document.execCommand('copy');
                clip_area.remove();
                document.getElementById("system_user_content").innerHTML = post;
                alert("已複製至剪貼簿");
            });
        </script>
        <!--------------------------------------------------------------------------------------------------------------------------------------->
    </body>
</html>
