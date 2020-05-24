<?php
session_start();
//刪除SESSION
$_SESSION["account"] = null;
$_SESSION["name"] = null;
//刪除COOKIE
if (isset($_COOKIE['google_id'])) {
    setcookie('google_id', null, -1, '/');
}
else if (isset($_COOKIE['fb_id'])) {
    setcookie('fb_id', null, -1, '/');
    header('Location: ../index.html');
}
else{header('Location: ../index.html');}

?>
<html>
    <head>
        <!--        <meta name="google-signin-scope" content="profile email">-->
        <meta name="google-signin-client_id" content="48428020310-9hp17cjtr6crev5tvl6litg2qi8i0521.apps.googleusercontent.com">
    </head>
    <body>
        <script>
//            onLoad();
//            signOut();
            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.disconnect();
                auth2.signOut().then(function () {
                    console.log('User signed out.');
                });
                document.location.href = "../index.html";

            }

            function onLoad() {
                gapi.load('auth2', function () {
                    gapi.auth2.init();

                });
            }
        </script>

        <a href="#" onclick="signOut();">Sign out google</a>

        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

    </body>
    <!--</html>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="48428020310-9hp17cjtr6crev5tvl6litg2qi8i0521.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <a href="#" onclick="signOut();">Sign out</a>
    <script>
        function signOut() {
    //        cosole.log("signlog");
            gapi.load('auth2', function () {
                gapi.auth2.init();
            });
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                console.log('User signed out.');
            });
        }
    </script>-->