<?php
require_once('azcommon.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?=C('webname')?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

  	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  	<link rel="shortcut icon" href="favicon.ico">


	<!-- Themify Icons -->
	<link rel="stylesheet" href="n/css/themify-icons.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="n/css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="n/css/owl.carousel.min.css">
	<link rel="stylesheet" href="n/css/owl.theme.default.min.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="n/css/magnific-popup.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="n/css/superfish.css">
	<!-- Easy Responsive Tabs -->
	<link rel="stylesheet" href="n/css/easy-responsive-tabs.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="n/css/animate.css">
	<!-- Theme Style -->
	<link rel="stylesheet" href="n/css/style.css">

	<!-- Modernizr JS -->
	<script src="n/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

		<!-- START #fh5co-header -->
		<header id="fh5co-header-section" role="header" class="" >
			<div class="container">

				

				<!-- <div id="fh5co-menu-logo"> -->
					<!-- START #fh5co-logo -->
					
					
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						
						
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li class="active">
								<a href="#">首页</a>
							</li>
							<li><a href="login.php">登陆</a></li>
							<li><a href="reg.php">注册</a></li>
                                                        <li><a href="http://img.u9vip.om/">正版查询</a></li>
									
									
						</ul>
					</nav>
				<!-- </div> -->

			</div>
		</header>
		
		
		<div id="fh5co-hero">
			<a href="#fh5co-main" class="smoothscroll fh5co-arrow to-animate hero-animate-4"><i class="ti-angle-down"></i></a>
			<!-- End fh5co-arrow -->
			<div class="container">
				<div class="col-md-8 col-md-offset-2">
					<div class="fh5co-hero-wrap">
						<div class="fh5co-hero-intro">
							<h1 class="to-animate hero-animate-1"><?=C('name')?></h1>
							<h2 class="to-animate hero-animate-2">梦想是要有的，万一见鬼了呢？</h2>
						<?php
				
				if(!C('loginuid')){
	            echo'<p class="to-animate hero-animate-3"><a href="login.php" class="btn btn-outline btn-lg">登陆</a><a href="reg.php" class="btn btn-outline btn-lg">注册</a></p>
				     ';
}else{
        echo '<p class="to-animate hero-animate-3"><a href="/home" class="btn btn-outline btn-lg">用户中心</a></p>';
    }
?>
							
						</div>
					</div>
				</div>
			</div>		
		</div>
		<br><br><br><br><br>
		
        
		<div id="fh5co-main">
	
			<div class="container">
				<div class="row" id="fh5co-features">
					
					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box">
						<div class="fh5co-feature-icon">
							<i class="ti-mobile"></i>
						</div>
						<h3 class="heading">安全的程序加密机制</h3>
						<p>
个人信息采用不可逆(MD5)进行反复加密存储，为用户提供安全的保障，使用更放心双重保障，即使数据泄露不法分子也无法使用，全方位保护您的个人信息安全</p>
					</div>
					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box"> 
						<div class="fh5co-feature-icon">
							<i class="ti-lock"></i>
						</div>
						<h3 class="heading">Think PHP结构</h3>
						<p>全新界面，多种布局，前台有更多种界面风格供用户选择。

后台首页模板更换插件更新，可支持导入界面 远程下载 首页模板随心变

兼容php7.0 运行速度大大提升</p>
					</div>

					<div class="clearfix visible-sm-block"></div>

					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box"> 
						<div class="fh5co-feature-icon">
							<i class="ti-palette"></i>
						</div>
						<h3 class="heading">为什么要同学录</h3>
						<p>时间这东西，既不多，也不少。时间如流水一般地从我们指缝间流去，“滴答滴答”声中流去。学生时代转瞬即逝，不应该要把握住着青春的美好记忆吗？</p>
					</div>

					<div class="clearfix visible-md-block visible-lg-block"></div>

					
				</div>
				<!-- END row -->

				<div class="fh5co-spacer fh5co-spacer-md"></div>
				<!-- End Spacer -->

				
				<!-- END row -->
				
				<div class="fh5co-spacer fh5co-spacer-md"></div>
				<div class="row">
					<!-- Start Slider Testimonial -->
	            <h2 class="fh5co-uppercase-heading-sm text-center animate-box">╹▽╹...友谊是一味药...╹▽╹</h2>
	            <div class="fh5co-spacer fh5co-spacer-xs"></div>
	            <div class="owl-carousel-fullwidth animate-box">
	            <div class="item">
	              <p class="text-center quote">“所谓好朋友就像我们一样，可以畅谈心中的感觉，彼此关心！ ” <cite class="author">—<?=C('webbq')?></cite></p>
	            </div>
	            <div class="item">
	              <p class="text-center quote">“在我们相聚的日子里，有着最珍惜的情谊，这份缘值得我们珍惜！ ” <cite class="author">—<?=C('webbq')?></cite></p>
	            </div>
	            <div class="item">
	              <p class="text-center quote">“曾经陪你笑陪你愁的朋友，是一辈子都不会忘记的，做个永远的朋友！ ” <cite class="author">—<?=C('webbq')?></cite></p>
	            </div>
	          </div>
	           <!-- End Slider Testimonial -->
				</div>
				<!-- END row -->
				<div class="fh5co-spacer fh5co-spacer-md"></div>

			</div>
			<!-- END container -->

		
		</div>
		<!-- END fhtco-main -->


		

		<footer role="contentinfo" id="fh5co-footer">
			<a href="#" class="fh5co-arrow fh5co-gotop footer-box"><i class="ti-angle-up"></i></a>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 footer-box">
						<h3 class="fh5co-footer-heading">什么是同学录？</h3>
						<p>同学，一般指是在一起学习生活的人互相帮助的人，共同携手并肩的人，共同在一起学习的人；
同学录，可以解说为记载着在一起学习生活的人的言行或事物的的书册。</p>
						

					</div>

					
<h3 class="fh5co-footer-heading">朋友，我们一起唱过的歌</h3>
				<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=389 height=110 src="//music.163.com/outchain/player?type=2&id=28941006&auto=1&height=90"></iframe>
					<div class="col-md-12 footer-box">
						<div class="fh5co-copyright">
						<p>CopyRight2016-2017 <?=C('webname')?> All Rights Reserved.<a href="#"><?=C('webbq')?></a>
特别鸣谢悠久工作室全体程序员付出的努力-才铸就了澄空同学录的诞生(*^▽^*)
						</div>
					</div>
					
				</div>
				<!-- END row -->
				<div class="fh5co-spacer fh5co-spacer-md"></div>
			</div>
		</footer>
			
			
		<!-- jQuery -->
		<script src="n/js/jquery-1.10.2.min.js"></script>
		<!-- jQuery Easing -->
		<script src="n/js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="n/js/bootstrap.js"></script>
		<!-- Owl carousel -->
		<script src="n/js/owl.carousel.min.js"></script>
		<!-- Magnific Popup -->
		<script src="n/js/jquery.magnific-popup.min.js"></script>
		<!-- Superfish -->
		<script src="n/js/hoverIntent.js"></script>
		<script src="n/js/superfish.js"></script>
		<!-- Easy Responsive Tabs -->
		<script src="n/js/easyResponsiveTabs.js"></script>
		<!-- FastClick for Mobile/Tablets -->
		<script src="n/js/fastclick.js"></script>
		<!-- Parallax -->
		<script src="n/js/jquery.parallax-scroll.min.js"></script>
		<!-- Waypoints -->
		<script src="n/js/jquery.waypoints.min.js"></script>
		<!-- Main JS -->
		<script src="n/js/main.js"></script>

	</body>
</html>
<SCRIPT Language=VBScript>