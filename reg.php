<?php
require_once 'azcommon.php';
if (C('zc') != 1) {
    exit("<script language='javascript'>alert('对不起，本站已关闭注册！');window.location.href='/index.php';</script>");
}
if ($_POST['do'] == 'register') {
    session_start();
    $user = safestr($_POST['user']);
    $qq = safestr($_POST['qq']);
    $pwd = safestr($_POST['pwd']);
    $phone = safestr($_POST['phone']);
    $code = safestr($_POST['code']);
    $bjmm = safestr($_POST['bjmm']);
    $ip = getip();
    $bjmm = safestr($_POST['bjmm']);
    $regkey = C("bjmm");
    if (strlen($user) < 5) {
        exit("<script language='javascript'>alert('用户名太短');history.go(-1);</script>");
    } elseif (strlen($user) < 5) {
        $msg = "用户名太短";
    } elseif (strlen($phone) > 11) {
        exit("<script language='javascript'>alert('电话号码不正确！');history.go(-1);</script>");
    } elseif ($bjmm !== $regkey) {
        exit("哎呀，出错了！注册密匙错误，联系站长大哥哥QQ" . C("webqq") . "解决吧。");
    } elseif (!$code || strtolower($_SESSION['klsf_code']) != strtolower($code)) {
        exit("<script language='javascript'>alert('验证码错误');history.go(-1);</script>");
    } elseif (strlen($user) > 12) {
        exit("<script language='javascript'>alert('用户名太长！');history.go(-1);</script>");
    } elseif (strlen($pwd) < 5) {
        exit("<script language='javascript'>alert('密码太简单！');history.go(-1);</script>");
    } elseif ($db->get_row("select uid from " . C('DB_PREFIX') . "users where user='{$user}' limit 1")) {
        exit("<script language='javascript'>alert('用户名已存在！');history.go(-1);</script>");
    } else {
        $_SESSION['klsf_code'] = md5(rand(100, 500) . time());
        $sid = md5(uniqid() . rand(1, 1000));
        $pwd = md5(md5($pwd) . md5('815856515'));
        $now = date("Y-m-d H:i:s");
        $city = get_ip_city($ip);
        $active = 1;
        if ($db->query("insert into  " . C('DB_PREFIX') . "users (user,pwd,sid,active,qq,city,regip,lastip,regtime,lasttime,phone) values ('{$user}','{$pwd}','{$sid}','{$active}','{$qq}','{$city}','{$ip}','{$ip}','{$now}','{$now}','{$phone}')")) {
            exit("<script language='javascript'>alert('注册成功,点击确定跳转登陆');window.location.href='/login.php';</script>");
        } else {
            $msg = "注册失败，" . mysql_error();
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>注册—<?=C('dlzc')?>の记忆</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="assets/js/jquery-2.1.1.min.js"></script>
<!--icons-css-->
<link href="assets/css/font-awesome.css" rel="stylesheet">
<!--static chart-->
    <link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=2.2.0" rel="stylesheet">

</head>
<body>


    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>

            <div>
                <p><font size="+6"><?=C('dlzc')?>の记忆</font></p>
            </div>
            


      

			<div class="login-block">
				<form action="?act=type" method="post">
<input type="hidden" name="do" value="login"/>
		<input type="hidden" name="do" value="register"/>
					<input type="text" name="user" class="form-control" placeholder="请输入您的用户名" required=""><br>
					<input type="password" name="pwd" class="form-control" class="lock" placeholder="请输入您的密码">
	<br>			
                        <input name="phone" type="text" class="form-control" placeholder="输入你的联系电话">
        <br>             
                        <input name="qq" type="text" class="form-control" placeholder="输入你的QQ号">
                   
			<br>	
                        <input name="email" type="text" class="form-control" placeholder="输入常用邮箱/Email">
<br><input name="bjmm" type="text" class="form-control" placeholder="输入班级密匙">
<br>
                   
                 		
                    
                        <input name="code" type="text" class="form-control" placeholder="输入验证码">
                      
                      
                     

<img title="点击刷新" src="code.php" onclick="javascript:this.src='code.php?'+Math.random();"></img>
                     

<style>
body {
/* 加载背景图 */
background-image: url(https://me.reoe.net/api/api.php?a=by);

/* 背景图垂直、水平均居中 */
background-position: center center;

/* 背景图不平铺 */
background-repeat: no-repeat;

/* 当内容高度大于图片高度时，背景图像的位置相对于viewport固定 */
background-attachment: fixed;

/* 让背景图基于容器大小伸缩 */
background-size: cover;

/* 设置背景颜色，背景图加载过程中会显示背景色 */
background-color: #464646;
}
</style>

					
						
				
             <button type="submit" class="btn btn-primary block full-width m-b">注 册</button>
					
	
				
				
			</div>
      </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<
<!--COPY rights end here-->

<!--scrolling js-->
		<script src="assets/js/jquery.nicescroll.js"></script>
		<script src="assets/js/scripts.js"></script>
		<!--//scrolling js-->
<script src="assets/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html><?php 