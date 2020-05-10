<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>purchase</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="https://fonts.googleapis.com/css?family=El+Messiri|Noto+Sans+TC&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="../images/logo-rainbow.png"  rel="icon">
		<style type="text/css" media="screen">
			#header{
				position: absolute;
				box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.075);
			}
			#header .left{
				position: fixed;
			}
			
			#header .right{
				position: fixed;
			}
			.chart_post{
				max-width: 800px;
				max-height: 400px;
				margin-left: 20%;
				/*position: absolute;
				left: 50%;
				top: 50%;
				margin-left: -400px;
				margin-top: -300px;
				*/
			}
			.chart_post_small{
				max-width: 300px;
				max-height: 150px;
				margin-left: 20%;
				/*position: absolute;
				left: 50%;
				top: 50%;
				margin-left: -400px;
				margin-top: -300px;
				*/
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
				box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.075);
			}
			#header .left{
				position: fixed;
			}

		</style>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<nav class="left">
					<a href="#menu"><span>Menu</span></a>
				</nav>
				<a href="../index.html" class="logo">insta builder</a>
				<nav class="right">
					<a href="#" class="button alt">Hi!</a>
				</nav>
			</header>

		<!-- Menu -->
			<nav id="menu">
				<ul class="links">
					<li><a href="../index/index.html">Home</a></li>
					<!--<li><a href="#"> Search</a></li>-->
					<!--<li><a href="#banner"> Analyze</a></li>-->
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

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<h1>服務升級</h1>
				</div>
				<div class="inner flex flex-3">
					<div class="flex-item box">
						<div class="image fit">
							<img src="images/pic02.jpg" alt="" />
						</div>
						<div class="content">
							<a href="generic.html"><h3>銀級</h3></a>							
							<p>Placerat ornare. Pellentesque od sed euismod in, pharetra ltricies edarcu cas consequat.</p>
						</div>
					</div>
					<div class="flex-item box">
						<div class="image fit">
							<img src="images/pic03.jpg" alt="" />
						</div>
						<div class="content">
							<a href="generic.html"><h3>黃金級</h3></a>							
							<p>Morbi in sem quis dui placerat Pellentesque odio nisi, euismod pharetra lorem ipsum.</p>
						</div>
					</div>
					<div class="flex-item box">
						<div class="image fit">
							<img src="images/pic04.jpg" alt="" />
						</div>
						<div class="content">
							<a href="generic.html"><h3>鑽石級</h3></a>
							<p>Nam dui mi, tincidunt quis, accu an porttitor, facilisis luctus que metus vulputate sem magna.</p>
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
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
			<script>

						var seasonData = {

						labels: ['post1', 'post2', 'post3', 'post4'],//數據的橫軸座標

						datasets: [{

						fillColor: 'rgba(0,0,0,0)',

						strokeColor: 'rgba(140,40,225,1)',//第一組數據的線顏色

						pointColor: 'rgba(140,40,225,1)',//點的顏色

						data: [11,37,10,3]//第一組數據的值

						}, {

						fillColor: 'rgba(0,0,0,0)',

						strokeColor: 'rgba(255,100,180,1)',//同上

						pointColor: 'rgba(255,100,180,1)',

						data: [9,29,15,1]//第二組數據的值

						}]

						}

					</script>
					<script>

					//用ID取畫布元素

					var canvas = document.getElementById('season').getContext('2d');

					//繪出圖形

					var lineDemo = new Chart(canvas).Line(seasonData, {

					responsive: true,//設置是否是響應式的

					pointDotRadius: 10,

					bezierCurve: false,

					scaleShowVerticalLines: false,

					scaleGridLineColor: 'gray'

					});

					</script>
	
					
		
					
	</body>
</html>