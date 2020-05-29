<!DOCTYPE HTML>
<!--
        Intensify by TEMPLATED
        templated.co @templatedco
        Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
session_start();
include '../php/FindOrder.php';
if ($_SESSION["account"] == "") {
    header('Location: ../login/login.php');
    $_SESSION["unLog"] = true;
}
?>
<html>
    <head>
        <title>Analyzed_post</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--GOOGLE SIGNOUT-->
        <meta name="google-signin-client_id" content="48428020310-9hp17cjtr6crev5tvl6litg2qi8i0521.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
        <meta name="google-signin-scope" content="profile email">
        <!------------>        
        <link href="https://fonts.googleapis.com/css?family=El+Messiri|Noto+Sans+TC&display=swap" rel="stylesheet">\

        <link rel="stylesheet" href="assets/css/main.css" />
        <link href="../images/logo-rainbow.png"  rel="icon">
        <style type="text/css" media="screen">

            .chart_small{
                height: 200px;
                width: 300px;
            }
            .row uniform{
                margin-top: 200px;
            }
            .content ul li {
			　display:inline;
            }
            .ig_3info{
                margin-top: 15px;
                margin-bottom: 15px;
            }
            .content img{
                width: 200px;
                height: 200px;
                border-radius: 100px;
            }
            .nav_search input{
                width: 400px;
                float: right;
            }
            .nav_search form{
                margin-top: 20px;
            }
            #header{
                position: absolute;

            }
            #header .left{
                position: fixed;
            }

            #header .right{
                position: fixed;
            }
            /* Box */

            .box {
                margin-bottom: 2rem;
                background: #FFF;
            }

            .box .image.fit {
                margin: 0;
                border-radius: 0;
            }

            .box .image.fit img {
                border-radius: 0;
            }

            .box header h2 {
                margin-bottom: 2rem;
            }

            .box header p {
                text-transform: uppercase;
                font-size: .75rem;
                font-weight: 300;
                margin: 0 0 .25rem 0;
                padding: 0 0 .75rem 0;
                letter-spacing: .25rem;
            }

            .box header p:after {
                content: '';
                position: absolute;
                margin: auto;
                right: 0;
                bottom: 0;
                left: 0;
                width: 50%;
                height: 1px;
                background-color: rgba(0, 0, 0, 0.125);
            }

            .box .content {
                padding: 3rem;
            }

            .box > :last-child,
            .box > :last-child > :last-child,
            .box > :last-child > :last-child > :last-child {
                margin-bottom: 0;
            }

            .box.alt {
                border: 0;
                border-radius: 0;
                padding: 0;
            }

            @media screen and (max-width: 736px) {

                .box .content {
                    padding: 2rem;
                }

            }

            .box {
                border-color: rgba(144, 144, 144, 0.25);
            }
            .wrapper.style2 {
                background-color: #f2f2f2;
                color: #a6a6a6;
            }

            .wrapper.style2 input, .wrapper.style2 select, .wrapper.style2 textarea {
                color: #000;
            }

            .wrapper.style2 a {
                color: #8a4680;
            }

            .wrapper.style2 strong, .wrapper.style2 b {
                color: #000;
            }

            .wrapper.style2 h1, .wrapper.style2 h2, .wrapper.style2 h3, .wrapper.style2 h4, .wrapper.style2 h5, .wrapper.style2 h6 {
                color: #000;
            }

            .wrapper.style2 blockquote {
                border-left-color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 code {
                background: rgba(0, 0, 0, 0.075);
                border-color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 hr {
                border-bottom-color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 .box {
                border-color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 input[type="submit"],
            .wrapper.style2 input[type="reset"],
            .wrapper.style2 input[type="button"],
            .wrapper.style2 button,
            .wrapper.style2 .button {
                background-color: #000;
                color: #f2f2f2 !important;
            }

            .wrapper.style2 input[type="submit"].alt,
            .wrapper.style2 input[type="reset"].alt,
            .wrapper.style2 input[type="button"].alt,
            .wrapper.style2 button.alt,
            .wrapper.style2 .button.alt {
                background-color: transparent;
                box-shadow: inset 0 0 0 2px rgba(0, 0, 0, 0.15);
                color: #000 !important;
            }

            .wrapper.style2 input[type="submit"].alt:hover,
            .wrapper.style2 input[type="reset"].alt:hover,
            .wrapper.style2 input[type="button"].alt:hover,
            .wrapper.style2 button.alt:hover,
            .wrapper.style2 .button.alt:hover {
                background-color: rgba(0, 0, 0, 0.075);
            }

            .wrapper.style2 input[type="submit"].alt:active,
            .wrapper.style2 input[type="reset"].alt:active,
            .wrapper.style2 input[type="button"].alt:active,
            .wrapper.style2 button.alt:active,
            .wrapper.style2 .button.alt:active {
                background-color: rgba(0, 0, 0, 0.2);
            }

            .wrapper.style2 input[type="submit"].alt.icon:before,
            .wrapper.style2 input[type="reset"].alt.icon:before,
            .wrapper.style2 input[type="button"].alt.icon:before,
            .wrapper.style2 button.alt.icon:before,
            .wrapper.style2 .button.alt.icon:before {
                color: #999999;
            }

            .wrapper.style2 input[type="submit"].special,
            .wrapper.style2 input[type="reset"].special,
            .wrapper.style2 input[type="button"].special,
            .wrapper.style2 button.special,
            .wrapper.style2 .button.special {
                background-color: #8a4680;
                color: #ffffff !important;
            }

            .wrapper.style2 input[type="submit"].special:hover,
            .wrapper.style2 input[type="reset"].special:hover,
            .wrapper.style2 input[type="button"].special:hover,
            .wrapper.style2 button.special:hover,
            .wrapper.style2 .button.special:hover {
                background-color: #9b4f90;
            }

            .wrapper.style2 input[type="submit"].special:active,
            .wrapper.style2 input[type="reset"].special:active,
            .wrapper.style2 input[type="button"].special:active,
            .wrapper.style2 button.special:active,
            .wrapper.style2 .button.special:active {
                background-color: #793d70;
            }

            .wrapper.style2 label {
                color: #000;
            }

            .wrapper.style2 input[type="text"],
            .wrapper.style2 input[type="password"],
            .wrapper.style2 input[type="email"],
            .wrapper.style2 select,
            .wrapper.style2 textarea {
                background: rgba(0, 0, 0, 0.075);
                border-color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 input[type="text"]:focus,
            .wrapper.style2 input[type="password"]:focus,
            .wrapper.style2 input[type="email"]:focus,
            .wrapper.style2 select:focus,
            .wrapper.style2 textarea:focus {
                border-color: #8a4680;
                box-shadow: 0 0 0 1px #8a4680;
            }

            .wrapper.style2 .select-wrapper:before {
                color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 input[type="checkbox"] + label,
            .wrapper.style2 input[type="radio"] + label {
                color: #a6a6a6;
            }

            .wrapper.style2 input[type="checkbox"] + label:before,
            .wrapper.style2 input[type="radio"] + label:before {
                background: rgba(0, 0, 0, 0.075);
                border-color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 input[type="checkbox"]:checked + label:before,
            .wrapper.style2 input[type="radio"]:checked + label:before {
                background-color: #8a4680;
                border-color: #8a4680;
                color: #ffffff;
            }

            .wrapper.style2 input[type="checkbox"]:focus + label:before,
            .wrapper.style2 input[type="radio"]:focus + label:before {
                border-color: #8a4680;
                box-shadow: 0 0 0 1px #8a4680;
            }

            .wrapper.style2 ::-webkit-input-placeholder {
                color: #999999 !important;
            }

            .wrapper.style2 :-moz-placeholder {
                color: #999999 !important;
            }

            .wrapper.style2 ::-moz-placeholder {
                color: #999999 !important;
            }

            .wrapper.style2 :-ms-input-placeholder {
                color: #999999 !important;
            }

            .wrapper.style2 .formerize-placeholder {
                color: #999999 !important;
            }

            .wrapper.style2 ul.alt li {
                border-top-color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 header p {
                color: #999999;
            }

            .wrapper.style2 table tbody tr {
                border-color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 table tbody tr:nth-child(2n + 1) {
                background-color: rgba(0, 0, 0, 0.075);
            }

            .wrapper.style2 table th {
                color: #000;
            }

            .wrapper.style2 table thead {
                border-bottom-color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 table tfoot {
                border-top-color: rgba(0, 0, 0, 0.15);
            }

            .wrapper.style2 table.alt tbody tr td {
                border-color: rgba(0, 0, 0, 0.15);
            }

            /* Flexgrid */

            .grid-style {
                width: 100%;
                margin: 0 0 2.5rem 0;
                display: -moz-flex;
                display: -webkit-flex;
                display: -ms-flex;
                display: flex;
                -moz-flex-wrap: wrap;
                -webkit-flex-wrap: wrap;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                -moz-align-items: stretch;
                -webkit-align-items: stretch;
                -ms-align-items: stretch;
                align-items: stretch;
            }

            .grid-style > * {
                -moz-flex-shrink: 1;
                -webkit-flex-shrink: 1;
                -ms-flex-shrink: 1;
                flex-shrink: 1;
                -moz-flex-grow: 0;
                -webkit-flex-grow: 0;
                -ms-flex-grow: 0;
                flex-grow: 0;
            }

            .grid-style > * {
                width: 50%;
            }

            .grid-style > * {
                padding: 2rem;
                width: calc(50% + 2rem);
            }

            .grid-style > :nth-child(-n + 2) {
                padding-top: 0;
            }

            .grid-style > :nth-last-child(-n + 2) {
                padding-bottom: 0;
            }

            .grid-style > :nth-child(2n + 1) {
                padding-left: 0;
            }

            .grid-style > :nth-child(2n) {
                padding-right: 0;
            }

            .grid-style > :nth-child(2n + 1),
            .grid-style > :nth-child(2n) {
                width: calc(50% + 0rem);
            }

            .grid-style .box {
                margin: 0;
            }

            @media screen and (max-width: 980px) {

                .grid-style > * {
                    width: 100%;
                }

                .grid-style > * {
                    padding: 1rem;
                    width: calc(50% + 1rem);
                }

                .grid-style > :nth-child(-n + 2) {
                    padding-top: 1rem;
                }

                .grid-style > :nth-last-child(-n + 2) {
                    padding-bottom: 1rem;
                }

                .grid-style > :nth-child(2n + 1) {
                    padding-left: 1rem;
                }

                .grid-style > :nth-child(2n) {
                    padding-right: 1rem;
                }

                .grid-style > :nth-child(2n + 1),
                .grid-style > :nth-child(2n) {
                    padding: 1rem;
                    width: calc(100% + 2rem);
                }

                .grid-style > * {
                    padding: 1rem;
                    width: calc(100% + 2rem);
                }

                .grid-style > :nth-child(-n + 1) {
                    padding-top: 0;
                }

                .grid-style > :nth-last-child(-n + 1) {
                    padding-bottom: 0;
                }

                .grid-style > :nth-child(1n + 1) {
                    padding-left: 0;
                }

                .grid-style > :nth-child(1n) {
                    padding-right: 0;
                }

                .grid-style > :nth-child(1n + 1),
                .grid-style > :nth-child(1n) {
                    width: calc(100% + 1rem);
                }

            }

            .gallery {
                width: 100%;
                margin: 2.5rem 0 2.5rem 0;
                display: -moz-flex;
                display: -webkit-flex;
                display: -ms-flex;
                display: flex;
                -moz-flex-wrap: wrap;
                -webkit-flex-wrap: wrap;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                -moz-align-items: stretch;
                -webkit-align-items: stretch;
                -ms-align-items: stretch;
                align-items: stretch;
            }

            .gallery > * {
                -moz-flex-shrink: 1;
                -webkit-flex-shrink: 1;
                -ms-flex-shrink: 1;
                flex-shrink: 1;
                -moz-flex-grow: 0;
                -webkit-flex-grow: 0;
                -ms-flex-grow: 0;
                flex-grow: 0;
            }

            .gallery > * {
                width: 50%;
            }

            .gallery > * {
                padding: 2rem;
                width: calc(50% + 2rem);
            }

            .gallery > :nth-child(-n + 2) {
                padding-top: 0;
            }

            .gallery > :nth-last-child(-n + 2) {
                padding-bottom: 0;
            }

            .gallery > :nth-child(2n + 1) {
                padding-left: 0;
            }

            .gallery > :nth-child(2n) {
                padding-right: 0;
            }

            .gallery > :nth-child(2n + 1),
            .gallery > :nth-child(2n) {
                width: calc(50% + 0rem);
            }

            .gallery .image {
                background: #FFF;
                padding: 1rem;
            }

            .gallery .image.fit {
                margin: 0;
            }

            @media screen and (max-width: 980px) {

                .gallery > * {
                    width: 100%;
                }

                .gallery > * {
                    padding: 1rem;
                    width: calc(50% + 1rem);
                }

                .gallery > :nth-child(-n + 2) {
                    padding-top: 1rem;
                }

                .gallery > :nth-last-child(-n + 2) {
                    padding-bottom: 1rem;
                }

                .gallery > :nth-child(2n + 1) {
                    padding-left: 1rem;
                }

                .gallery > :nth-child(2n) {
                    padding-right: 1rem;
                }

                .gallery > :nth-child(2n + 1),
                .gallery > :nth-child(2n) {
                    padding: 1rem;
                    width: calc(100% + 2rem);
                }

                .gallery > * {
                    padding: 1rem;
                    width: calc(100% + 2rem);
                }

                .gallery > :nth-child(-n + 1) {
                    padding-top: 0;
                }

                .gallery > :nth-last-child(-n + 1) {
                    padding-bottom: 0;
                }

                .gallery > :nth-child(1n + 1) {
                    padding-left: 0;
                }

                .gallery > :nth-child(1n) {
                    padding-right: 0;
                }

                .gallery > :nth-child(1n + 1),
                .gallery > :nth-child(1n) {
                    width: calc(100% + 1rem);
                }

            }
            .bigbox {
                margin: 0 auto;
                max-width: 65em;
            }

            @media screen and (max-width: 800px) {

                .inner {
                    max-width: 90%;
                }

            }

            @media screen and (max-width: 500px) {

                .inner {
                    max-width: 70%;
                }

            }

            @media screen and (max-width: 256px) {

                .inner {
                    max-width: 85%;
                }

            }
            #footer {
                padding: 6em 0 4em 0;
                /*background: #c9c9ff;*/
                background-image: linear-gradient(to right, #E283A0, #946ccc);
                text-align: center;
                color: #c8e7f0;
            }

            #footer h2 {
                font-size: 25px;
                font-weight: 300;
                color: #ffffff;
            }

            #footer .icon {
                color: #ffffff;
            }

            #footer a {
                color: #c8e7f0;
                text-decoration: none;
            }

            #footer ul li {
                padding: 0 2em;
            }

            #footer .copyright {
                display: inline-block;
                color: #ffffff;
                font-size: 0.75em;
                margin: 0 0 2em 0;
                padding: 0;
                text-align: center;
                border-top: 3px solid rgba(255, 255, 255, 0.25);
                padding: 2em 10em;
            }

            @media screen and (max-width: 980px) {

                #footer {
                    padding: 3em 0 1em 0;
                }

                #footer ul li {
                    display: block;
                    padding: .25em 0;
                }

            }

            @media screen and (max-width: 736px) {

                #footer .copyright {
                    padding: 2em 5em;
                }

            }

            @media screen and (max-width: 480px) {

                #footer {
                    padding: 2em 0 0.1em 0;
                }

                #footer ul li {
                    font-size: .9em;
                }

                #footer ul li .icon:before {
                    margin-left: -1em;
                }

                #footer .copyright {
                    padding: 2em 0;
                }

            }

        </style>
    </head>
    <body>

        <!-- Header -->
        <header id="header">
            <nav class="left">
                <a href="#menu"><span>Menu</span></a>
            </nav>
            <a href="../index.html" class="logo">InstaBuilder</a>
            <nav class="right">
                <a href="#" onclick="signOut();" name="logout" class="button alt"><?php echo $_SESSION["name"]; ?>-登出</a>
            </nav>
        </header>

        <!-- Menu -->
        <nav id="menu">
            <ul class="links">

                <li><a href="../analyzed_post/analyzed_post.php"> 貼文分析</a></li>
                <li><a href="../analyzed_hashtag/analyzed_hashtag.php"> 標籤分析</a></li>
                <li><a href="../analyzed_time/analyzed_time.php"> 時間分析</a></li>
                <li><a href="../analyzed_difference/analyzed_difference.php"> 差異分析</a></li>
                <li><a href="../analyzed_follow/analyzed_follow.php"> 追蹤分析</a></li>
                <li><a href="../analyzed_top9/analyzed_top9.php"> TOP 9 貼文</a></li>
                <li><a href="../purchase/purchase.php"> 服務升級</a></li>
                <li><a href="../auto_post/auto_post.php"> 自動發文</a></li>
            </ul>
            <ul class="actions vertical">
                <li><a href="#" class="button fit">Log out</a></li>
            </ul>
        </nav>

        <!-- One -->
        <section id="one" class="wrapper">			
            <div class="inner">	
                <h1>貼文分析</h1>										
                <div>							
                    <div class="box">		
                        <div class="content">
                            <header class="align-center">
                                <p>post analyzed</p>
                                <h2>貼文分析一覽表</h2>
                            </header>

                            <div >									
                                <canvas id="post_all" width="10" height="5"></canvas>
                            </div>
                            <div >									
                                <canvas id="TEST2" width="10" height="5"></canvas>
                            </div>

                            <div >									
                                <canvas id="TEST" width="10" height="5"></canvas>
                            </div>
                            <div >                                  
                                <canvas id="post_like" width="10" height="9"></canvas>
                            </div>
                            <div >                                  
                                <canvas id="post_comment" width="10" height="9"></canvas>
                            </div>
                        </div>							
                    </div>							
                </div>
            </div>
        </section>


        <!-- One -->
        <div align="center"><section id="one" class="wrapper style2" >

                <div class="inner">
                    <div class="grid-style">
                        <div>
                            <div class="box">				
                                <div class="content">
                                    <header class="align-center">

                                        <h2>貼文按讚數分析</h2>
                                    </header>
                                   <!-- <canvas id="post_like" width="10" height="15"></canvas>-->
                                </div>								
                            </div>
                        </div>
                        <div>						
                            <div class="box">	
                                <div class="content">
                                    <header class="align-center">

                                        <h2>貼文留言數分析</h2>
                                    </header>
                                    <!--<canvas id="post_comment" width="10" height="9"></canvas>-->
                                </div>								
                            </div>	
                        </div>			
                        <div>						
                            <div class="box">	
                                <div class="content">
                                    <header class="align-center">

                                        <h2>貼文珍藏數分析</h2>
                                    </header>
                                    <canvas id="post_save" width="10" height="9"></canvas>
                                </div>								
                            </div>	
                        </div>	
                        <div>						
                            <div class="box">	
                                <div class="content">
                                    <header class="align-center">

                                        <h2>貼文觸及率分析</h2>
                                    </header>
                                    <canvas id="post_reach" width="10" height="9"></canvas>
                                </div>								
                            </div>	
                        </div>				
                    </div>
                </div>
            </section>



            <!-- Footer -->
            <footer id="footer">
                <div class="container">
                    <h2>聯絡我們</h2>
                    <ul class="icons">
                        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
                    </ul>
                </div>
                <div class="copyright">
                    &copy; NTUB 109501
                </div>
            </footer>
            <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
            
            <script src="../node_modules/chart.js/dist/Chart.js"></script>
            <script>
//                GOOGLE 登出按鈕
//            onLoad();
//            signOut();
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

            <script>
                var ctx = document.getElementById('post_all');
                var post_all = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        datasets: [{
                                label: 'Bar Dataset',
                                data: [10, 20, 30, 40],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)'
                                ],
                                order: 1
                            }, {
                                label: 'Line Dataset',
                                data: [15, 25, 15, 30],
                                type: 'line',
                                backgroundColor: [
                                    'rgba(75, 192, 192, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(75, 192, 192, 1)'
                                ],
                                pointBackgroundColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)'
                                ],
                                pointborderColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)'
                                ],
                                fill: false,
                                lineTension: 0,
                                order: 2
                            }],
                        labels: ['January', 'February', 'March', 'April']
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                        }
                    }
                });

            </script>
            <!----------------------------------------TEST------------------------------------------->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
            <script>
                // y 軸的顯示
                var yAxis = [];
                // 資料集合，之後只要更新這個就好了。
                var datas = [];
                var ctx = document.getElementById('TEST').getContext('2d');
                var lineChart = new Chart(ctx, {
                    //Type 改成 Bar
                    type: 'bar',
                    data: {
                        labels: yAxis,
                        datasets: [{
                                label: '測試資料',
                                data: datas,
                                backgroundColor: "#E283A0"
                            }]
                    }
                });

                //時間格式
                var timeFormat = 'HH:mm:ss';

                function appendData()
                {
                    //超過10 個，就把最早進來的刪掉
                    if (yAxis.length > 10) {
                        yAxis.shift();
                        datas.shift();
                    }

                    //推入y 軸新的資料 
                    yAxis.push(new moment().format(timeFormat));

                    //推入一筆亂數進資料 10~100
                    datas.push(Math.floor(Math.random() * 100) + 10);

                    //更新線圖
                    lineChart.update();
                }

                //每半秒做一次
                setInterval(appendData, 1000);
            </script>

            <!----------------------------------------TEST2------------------------------------------->

            <script>
                var ctx = document.getElementById("TEST2").getContext("2d");

                var data = {
                    labels: ["貼文1", "貼文2", "貼文3"],
                    datasets: [
                        {
                            label: "留言",
                            backgroundColor: "#c3d6f2",
                            data: [3, 7, 4],
                        },
                        {
                            label: "珍藏",
                            backgroundColor: "#789cce",
                            data: [4, 3, 5]
                        },
                        {
                            label: "分享",
                            backgroundColor: "d1eaf5",
                            data: [7, 2, 6]
                        },
                    ]
                };

                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: {
                        barValueSpacing: 20,
                        scales: {
                            yAxes: [{
                                    ticks: {
                                        min: 0,
                                    }
                                }]
                        }
                    }

                });
            </script>


            <script>
                ajaxChart("post_like", "like");
                ajaxChart("post_comment", "comment");

                function ajaxChart(ChartName, ChartTableName) {
                    $.ajax({
                        type: "GET",
                        cache: false,
                        url: "AjaxLike_Comment.php",
                        data: {
                            type: ChartTableName,
                        },
                        dataType: "json",
                        success: function (response) {
                            //主要Chart.js繪圖區
                            const data = response; //取得data.php回傳的資料
                            const all_x_labels = [], all_y_data = [], Background_color = [];

                            //利用陣列建立x,y座標
                            for (let i = 0; i < response.length; i++) {
                                if (data[i].content.length > 10) {
                                    all_x_labels[i] = data[i].content.substr(0, 10) + "..." + "\n" + data[i].announce_time;
                                } else {
                                    all_x_labels[i] = data[i].content + "\n" + data[i].announce_time;
                                }
                                all_y_data[i] = data[i].count;

                                Background_color[i] = "#c9c9ff";
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
                                            borderColor: "#8BA2FF", // 設定線的顏色
                                            backgroundColor: Background_color, // 設定點的顏色
                                            pointBorderWidth: 6,
//                                            pointBorderColor: "#FF82B4",
//                                            lineTension: 0.1  // 顯示折線圖，不使用曲線
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
//                                                          min: 10,
//                                                          stepSize: 2
                                                },

                                            }],
                                        xAxes: [{
                                                ticks: {
                                                    minRotation: 90,

                                                    // beginAtZero: true,
//                                                    min: 10,
//                                                    maxTicksLimit: 10,

                                                },

                                            }],

                                    }

                                }
                            });
                        }
                    });
                }


//			var ctx = document.getElementById('post_like');
//			var post_like = new Chart(ctx, {
//			    type: 'bar',
//			    data: {
//			        labels: ['貼文1', '貼文2', '貼文3', '貼文4', '貼文5', '貼文6','貼文7', '貼文8', '貼文9', '貼文10'],
//			        
//			        datasets: [{
//			            label: '貼文按讚數',
//			            data: [120, 190, 130, 170, 200, 300, 1300, 170, 200, 300],
//			            backgroundColor: 'rgba(255,222,242,1)',
//			                        
//			            borderWidth: 1
//			        }]
//			    },
//			    options: {
//			        scales: {
//			            yAxes: [{
//			                ticks: {
//			                    beginAtZero: true,
//			                   
//			                }
//			            }]
//			        }
//			        
//			    }
//			});
            </script>

            <script>
//                var ctx = document.getElementById('post_comment');
//                var post_comment = new Chart(ctx, {
//                    type: 'bar',
//                    data: {
//                        labels: ['貼文1', '貼文2', '貼文3', '貼文4', '貼文5', '貼文6', '貼文7', '貼文8', '貼文9', '貼文10'],
//
//                        datasets: [{
//                                label: '貼文留言數',
//                                data: [12, 10, 10, 17, 20, 0, 13, 1, 20, 15],
//                                backgroundColor: 'rgba(242,226,255,0.8)',
//                                borderColor: 'rgba(242,226,255,1)',
//                                borderWidth: 1
//                            }]
//                    },
//                    options: {
//                        scales: {
//                            yAxes: [{
//                                    ticks: {
//                                        beginAtZero: true,
//
//                                    }
//                                }]
//                        }
//
//                    }
//                });
            </script>
            <script>
                var ctx = document.getElementById('post_save');
                var post_save = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['貼文1', '貼文2', '貼文3', '貼文4', '貼文5', '貼文6', '貼文7', '貼文8', '貼文9', '貼文10'],

                        datasets: [{
                                label: '貼文珍藏數',
                                data: [50, 24, 30, 40, 200, 45, 33, 17, 300, 315],
                                backgroundColor: 'rgba(226,238,255,0.8)',
                                borderColor: 'rgba(226,238,255,1)',
                                borderWidth: 1
                            }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                    ticks: {
                                        beginAtZero: true,

                                    }
                                }]
                        }

                    }
                });
            </script>
            <script>
                var ctx = document.getElementById('post_reach');
                var post_reach = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['貼文1', '貼文2', '貼文3', '貼文4', '貼文5', '貼文6', '貼文7', '貼文8', '貼文9', '貼文10'],

                        datasets: [{
                                label: '貼文觸及率',
                                data: [1200, 1900, 1300, 1070, 2000, 1300, 1300, 1070, 2000, 2300],
                                backgroundColor: 'rgba(221,255,252,0.8)',
                                borderColor: 'rgba(221,255,252,0.8)',
                                borderWidth: 1
                            }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                    ticks: {
                                        beginAtZero: true,

                                    }
                                }]
                        }

                    }
                });
            </script>



    </body>
</html>