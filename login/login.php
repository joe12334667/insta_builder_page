<!DOCTYPE HTML>
<!--
        Intensify by TEMPLATED
        templated.co @templatedco
        Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
session_start();
include '../php/FindOrder.php';
?>
<html>
    <head>
        <title>login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css?family=El+Messiri|Noto+Sans+TC&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/main.css" />
        <link href="../images/logo-rainbow.png"  rel="icon">
        <!--google login 引用-->
        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="815491116462-0ooiteovcl08la9u5t4mik8sj9nsepct.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <!--google login 引用-->
        <!--sweetalert2 引用-->
        <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
        <!--sweetalert2 引用-->
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

                margin-left: 300px;
                margin-bottom: 150px;
            }



        </style>
    </head>
    <body class="subpage">
        <?php
        if (isset($_SESSION["unLog"])) {
            if ($_SESSION["unLog"]) {
                echo '<script>  swal.fire({
                text: "未登入或登入逾時！",
                icon: "error",
                button: false,
                timer: 2000,
                }); </script>';
                session_unset();
            }
        }



        if (isset($_POST["next"])) {
            findUser($_POST["account"], $_POST["password"]);
        }
        ?>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v7.0&appId=828605147630397"></script>


        <!-- Header -->
        <header id="header">

            <a href="../index.html" class="logo">insta builder</a>

        </header>


        <!-- Main6u$ 12u$(xsmall) -->
        <section id="login" class="wrapper">
            <div class="inner">
                <header class="align-center">
                    <form method="post" action="">
                        <h1>Login</h1>
                        <div class="login_input">
                            <input type="text" name="account" id="account" value="" placeholder="帳號" />
                        </div>
                        <div class="login_input">
                            <input type="password" name="password" id="password" value="" placeholder="密碼" />
                        </div>
                        <div>
                            <a href="" class="login_forget">忘記密碼</a>
                        </div>

                        <div>
                            <!--<a href="../analyzed_post/analyzed_post.html" class="button special">登入</a>-->
                            <input type="submit" name="next" class="button special" value="登入">
                        </div>
                        <div>
                            <div class="g-signin2" data-onsuccess="onSignIn" data-theme="white"></div>
                                                        <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="true" data-use-continue-as="true" data-width="" onclick="FBLogin();"></div>
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

                        Cookies.set('google_email', profile.getName());
                        Cookies.set('google_Name', profile.getEmail());
                        Cookies.set('google_image_url', profile.getImageUrl());


                        // The ID token you need to pass to your backend:
                        var id_token = googleUser.getAuthResponse().id_token;
                        console.log("ID Token: " + id_token);
                    }

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
                        document.getElementById('content').innerHTML = "";//先清空顯示結果

                        //FB.api()使用說明：https://developers.facebook.com/docs/javascript/reference/FB.api
                        //取得用戶個資
                        FB.api("/me", "GET", {fields: 'last_name,first_name,name,email'}, function (user) {
                            //user物件的欄位：https://developers.facebook.com/docs/graph-api/reference/user
                            if (user.error) {
                                console.log(response);
                            } else {

                                document.getElementById('content').innerHTML = JSON.stringify(user);
                            }
                        });

                    }
                </script>


                </body>
                </html>