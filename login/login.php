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
                </script>
                </body>
                </html>