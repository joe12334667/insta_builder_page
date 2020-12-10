<!DOCTYPE HTML>
<!--
        Intensify by TEMPLATED
        templated.co @templatedco
        Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
session_start();
include '../php/FindOrder.php';
//如果用戶已登入不會要求再登入一次，而是直接跳頁
if (isset($_SESSION["account"])) {
    if ($_SESSION["account"] != null) {
        header("Location: ../dashboard/dashboard.php");
    }
}
?>
<?php
//未登入或登入逾時 跳出alert 
//由analyed...頁面傳出unlog來判斷
if (isset($_SESSION["unLog"])) {
    if ($_SESSION["unLog"]) {
        echo '<script>  
                alert("未登入或登入逾時！");
                </script>';
        session_unset();
    }
}


//      登入確認
if (isset($_POST["next"])) {
    findUser($_POST["account"], $_POST["password"]);
}
?>
<html>
    <head>
        <title>login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- <link href="https://fonts.googleapis.com/css?family=El+Messiri|Noto+Sans+TC&display=swap" rel="stylesheet"> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/main.css" />
        <link href="../images/logo-rainbow.png"  rel="icon">
        <!--google login 引用-->
        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="48428020310-9hp17cjtr6crev5tvl6litg2qi8i0521.apps.googleusercontent.com">
        <!--<meta name="google-signin-client_id" content="815491116462-0ooiteovcl08la9u5t4mik8sj9nsepct.apps.googleusercontent.com">-->
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
        <!--google login 引用-->
        <!--sweetalert2 引用-->
        <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">

        <!--sweetalert2 引用-->  
        <script src="../node_modules/sweetalert2/dist/sweetalert2.all.js" type="text/javascript"></script>
        <!--js-cookie 引用-->
        <script src="../node_modules/js-cookie/src/js.cookie.js"></script>
        <!--js-cookie 引用-->


        <style type="text/css" media="screen">

            .align-center input{
                margin: 0 auto;
                margin-bottom: 15px;
                width: 400px;
            }
            .g-signin2{
                margin: 0 auto;
                margin-bottom: 15px;
                width: 400px;
            }
            .align-center a{
                margin-top: 10px;
                margin-bottom: 5px;
                width: 400px;
            }
            .align-center  .login_forget{

                /* margin-left: 300px; */
                margin-bottom: 150px;
            }

            .abcRioButton {
                -webkit-border-radius: 4px;
                border-radius: 4px;

                box-shadow: 0 2px 4px 0 rgba(0,0,0,0);
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-transition: background-color .218s,border-color .218s,box-shadow .218s;
                transition: background-color .218s,border-color .218s,box-shadow .218s;
                -webkit-user-select: none;
                -webkit-appearance: none;
                background-color: #fff;
                background-image: none;
                /* color: #262626; */
                cursor: pointer;
                outline: none;
                overflow: hidden;
                position: relative;
                text-align: center;
                vertical-align: middle;
                white-space: nowrap;
                width: auto;
            }

        </style>
    </head>
    <body class="subpage">

        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v7.0&appId=828605147630397"></script>


        <!-- Header -->
        <header id="header">

            <a href="../index.html" class="logo">InstaBuilder</a>

        </header>


        <!-- Main6u$ 12u$(xsmall) -->
        <section id="login" class="wrapper">
            <div class="inner">
                <header class="align-center">
                    <form method="post" action="">
                        <h1>Login</h1>
                        <div class="login_input">
                            <input type="text" name="account" id="account" value="" placeholder="請輸入電子郵件" />
                        </div>
                        <div class="login_input">
                            <input type="password" name="password" id="password" value="" placeholder="密碼" />
                        </div>
                        <div>
                            <a href="" class="login_forget">忘記密碼</a>
                        </div>

                        <div>
                            <input type="submit" name="next" class="button special" value="登入">
                        </div>
                        <div>
                            <p>或</p>
                        </div>
                        <div>
                            <!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
                            <div>
                                <input type="button" value="Facebook登入" onclick="FBLogin();" />
                            </div>
                            <div class="g-signin2" data-width="400" data-height="50"  data-onsuccess="onSignIn" data-longtitle="true" >

                            </div>

                            <div>
                                <a href="../sign up/sign-up.php" class="button alt">建立帳號</a>
                            </div>
                    </form>

                </header>



                <!-- Scripts -->
                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/js/jquery.scrolly.min.js"></script>
                <script src="assets/js/skel.min.js"></script>
                <script src="assets/js/util.js"></script>
                <script src="assets/js/main.js"></script>
                <script>

                                    //google sign in
                                    function onSignIn(googleUser) {
                                        // Useful data for your client-side scripts:
                                        var profile = googleUser.getBasicProfile();
                                        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
                                        console.log('Full Name: ' + profile.getName());
                                        console.log('Given Name: ' + profile.getGivenName());
                                        console.log('Family Name: ' + profile.getFamilyName());
                                        console.log("Image URL: " + profile.getImageUrl());
                                        console.log("Email: " + profile.getEmail());

                                        //設定COOKIE 讓下一頁PHP吃的到
                                        Cookies.set('google_id', profile.getId());
                                        Cookies.set('google_name', profile.getName());
                                        Cookies.set('google_email', profile.getEmail());
                                        Cookies.set('google_image_url', profile.getImageUrl());
                                        document.location.href = "../php/login_change.php";
                                        // The ID token you need to pass to your backend:
                                        var id_token = googleUser.getAuthResponse().id_token;
                                        console.log("ID Token: " + id_token);
                                    }
                                    window.onbeforeunload = function (e) {

                                        gapi.auth2.getAuthInstance().signOut();
                                    };


                                    //----------------------------------------------------------

                </script>
                <script type="text/javascript">

                    // fb sign in 

                    //應用程式編號，進入 https://developers.facebook.com/apps/ 即可看到
                    let FB_appID = "828605147630397";



                    // Load the Facebook Javascript SDK asynchronously
                    (function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://connect.facebook.net/en_US/sdk.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));

                    window.fbAsyncInit = function () {
                        FB.init({
                            appId: FB_appID, //FB appID
                            cookie: true, // enable cookies to allow the server to access the session
                            xfbml: true, // parse social plugins on this page
                            version: 'v7.0' // use graph api version
                        });
                        FB.AppEvents.logPageView();

                    };

                    //使用自己客製化的按鈕來登入
                    function FBLogin() {
                        FB.getLoginStatus(function (res) {
                            console.log(`status:${res.status}`);//Debug

                            if (res.status === "connected") {
                                let userID = res["authResponse"]["userID"];
                                console.log("用戶已授權您的App，用戶須先revoke撤除App後才能再重新授權你的App");
                                console.log(`已授權App登入FB 的 userID:${userID}`);
                                alert("132")
                                GetProfile();

                            } else if (res.status === 'not_authorized' || res.status === "unknown") {
                                //App未授權或用戶登出FB網站才讓用戶執行登入動作
                                FB.login(function (response) {

                                    //console.log(response); //debug用
                                    if (response.status === 'connected') {
                                        //user已登入FB
                                        //抓userID
                                        let userID = response["authResponse"]["userID"];
                                        console.log(`已授權App登入FB 的 userID:${userID}`);
                                        GetProfile();

                                    } else {
                                        // user FB取消授權
                                        alert("Facebook帳號無法登入");
                                    }
                                    //"public_profile"可省略，仍然可以取得name、userID
                                }, {scope: 'email'});
                            }
                        });


                    }
                    function GetProfile() {


                        //FB.api()使用說明：https://developers.facebook.com/docs/javascript/reference/FB.api
                        //取得用戶個資
                        FB.api("/me", "GET", {fields: 'last_name,first_name,name,email'}, function (user) {
                            //user物件的欄位：https://developers.facebook.com/docs/graph-api/reference/user
                            if (user.error) {
                                console.log(response);
                            } else {
//
//                                document.getElementById('content').innerHTML = JSON.stringify(user);

                                //設定COOKIE 讓下一頁PHP吃的到
                                Cookies.set('fb_id', user["id"]);
                                Cookies.set('fb_email', user["email"]);
                                Cookies.set('fb_name', user["name"]);
                                document.location.href = "../php/login_change.php";


                            }
                        });

                    }
                </script>


                </body>
                </html>