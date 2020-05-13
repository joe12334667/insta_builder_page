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
				
			}
			#header .left{
				position: fixed;
			}
			
			#header .right{
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
				<a href="../index.html" class="logo">InstaBuilder</a>
				<nav class="right">
				<a href="../php/logOut.php" name="logout" class="button alt"><?php echo $_SESSION["name"]; ?>-登出</a>
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

		<!-- One -->
			<section id="one" class="wrapper">			
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
							
	</body>
	
</html>