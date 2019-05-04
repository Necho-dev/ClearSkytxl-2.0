
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首页-<?=C('webname')?></title>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <link href="syys/css/bootstrap.min.css" rel="stylesheet">
    <link href="syys/css/font-awesome.min.css" rel="stylesheet">
    <link href="syys/css/flexslider.css" rel="stylesheet" >
    <link href="syys/css/styles.css" rel="stylesheet">
    <link href="syys/css/queries.css" rel="stylesheet">
    <link href="syys/css/animate.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body id="top">
        <header id="home">
          
          <section class="hero" id="hero">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center inner">
                  <h1 class="animated fadeInDown"><?=C('name')?></h1>
                  <p class="animated fadeInUp delay-05s">梦想是要有的，万一见鬼了呢？</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
				<?php
				
				if(!C('loginuid')){
	            echo'<a href="login.php" class="learn-more-btn">登陆</a>
				     <a href="reg.php" class="learn-more-btn">注册</a>';
}else{
        echo '<a href="/home" class="learn-more-btn">用户中心</a>';
    }
?>
                  
                </div>
              </div>
            </div>
          </section>
        </header>
        <section class="intro text-center section-padding" id="intro">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 wp1">
                <h1 class="arrow">什么是同学录？有什么用？</h1>
                <p>同学，一般指是在一起学习生活的人互相帮助的人，共同携手并肩的人，共同在一起学习的人；
同学录，可以解说为记载着在一起学习生活的人的言行或事物的的书册。同学之间相互了解，寻找过去的记忆</p>
              </div>
            </div>
          </div>
        </section>
        <div class="copyrights">Collect from </div>
        <section class="features text-center section-padding" id="features">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1 class="arrow">我们的优势</h1>
                <div class="features-wrapper">
                  <div class="col-md-4 wp2">
                    <div class="icon">
                      <i class="fa fa-laptop shadow"></i>
                    </div>
                    <h2>安全的程序加密机制</h2>
                    <p>个人信息采用不可逆(MD5)进行反复加密存储，为用户提供安全的保障，使用更放心双重保障，即使数据泄露不法分子也无法使用，全方位保护您的个人信息安全
                    </p>
                  </div>
                  <div class="col-md-4 wp2 delay-05s">
                    <div class="icon">
                      <i class="fa fa-code shadow"></i>
                    </div>
                    <h2>Think PHP结构</h2>
                    <p>全新界面，多种布局，前台有更多种界面风格供用户选择。

后台首页模板更换插件更新，可支持导入界面 远程下载 首页模板随心变

兼容php7.0 运行速度大大提升</p>
                  </div>
                  <div class="col-md-4 wp2 delay-1s">
                    <div class="icon">
                      <i class="fa fa-heart shadow"></i>
                    </div>
                    <h2>为什么要同学录</h2>
                    <p>时间这东西，既不多，也不少。时间如流水一般地从我们指缝间流去，“滴答滴答”声中流去。学生时代转瞬即逝，不应该要把握住着青春的美好记忆吗？
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </section> 
        
        <section class="subscribe text-center">
          <div class="container">
            <h1><span>“在我们相聚的日子里，有着最珍惜的情谊，这份缘值得我们珍惜！ ”</span></h1><br>
			<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=389 height=110 src="//music.163.com/outchain/player?type=2&id=<?=C('symusic')?>&auto=1&height=90"></iframe>
          </div>
        </section>
        <section class="dark-bg text-center section-padding contact-wrap" id="contact">
          <a href="#top" class="up-btn"><i class="fa fa-chevron-up"></i></a>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1 class="arrow">╹▽╹...友谊是一味药...╹▽╹</h1>
              </div>
            </div>
            <div class="row contact-details">
              <div class="col-md-4">
                <div class="light-box box-hover">
                  <h2><i class="fa fa-map-marker"></i><span>Tiem</span></h2>
                  <p><?php echo date("Y年m月d日H时i分s秒") ?></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="light-box box-hover">
                  <h2><i class="fa fa-mobile"></i><span>QQ</span></h2>
                  <p><?=C('webqq')?></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="light-box box-hover">
                  <h2><i class="fa fa-paper-plane"></i><span>Email</span></h2>
                  <p><a href="#">><?=C('webmail')?></</a></p>
                </div>
              </div>
            </div>
            
          </div>
        </section>
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <ul class="legals">
                  <li><a href="#">CopyRight2016-2017 <?=C('webname')?> </a></li>
                  <li><a href="#">All Rights Reserved.<a href="#"><?=C('webbq')?> </a></li>
                </ul>
              </div>
              <div class="col-md-6 credit">
                <p>特别鸣谢悠久工作室全体程序员付出的努力-<a href="http://img.u9vip.om/">正版授权查询(*^▽^*)
              </div>
            </div>
          </div>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="syys/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="syys/js/waypoints.min.js"></script>
        <script src="syys/js/bootstrap.min.js"></script>
        <script src="syys/js/scripts.js"></script>
        <script src="syys/js/jquery.flexslider.js"></script>
        <script src="syys/js/modernizr.js"></script>
      </body>
    </html>