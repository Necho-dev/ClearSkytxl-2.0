<?php
/*
   Login
   */
require_once('azcommon.php');
if($_POST['do']=='login'){
	$user=safestr($_POST['user']);
	$pwd=safestr($_POST['pwd']);
	$ip=getip();
	if(!$user || !$pwd){
		exit("<script language='javascript'>alert('请确保两项都不为空！');history.go(-1);</script>");
	}elseif(strlen($user) < 5){
		exit("<script language='javascript'>alert('用户名太短！');history.go(-1);</script>");
	}elseif(strlen($pwd) < 5){
		exit("<script language='javascript'>alert('密码太简单！');history.go(-1);</script>");
	}else{
		$pwd=md5(md5($pwd).md5('815856515'));
		if(is_numeric($user)){
			$where="(user='$user' or phone='$user') and pwd='$pwd'";
		}else{
			$where="(user='$user' or mail='$user') and pwd='$pwd'";
		}
		if($row=$db->get_row("select uid,user from ".C('DB_PREFIX')."users where {$where} limit 1")){
			$sid=md5(uniqid().rand(1,1000));
			$now=date("Y-m-d H:i:s");
			$ip=getip();
			$db->query("update ".C('DB_PREFIX')."users set sid='$sid',lasttime='$now',lastip='$ip' where uid='{$row[uid]}'");
			setcookie("klsf_sid",$sid,time()+3600*24*14,'/');
			$ntime=date("G"); //取得现在的时间
	if($ntime>=0 and $ntime<4){exit("<script language='javascript'>alert('{$row[user]}，午夜好！');window.location.href='/home';</script>");}
	if($ntime>=4 and $ntime<11){exit("<script language='javascript'>alert('{$row[user]}，早上好！');window.location.href='/home';</script>");}
	if($ntime>=11 and $ntime<14){exit("<script language='javascript'>alert('{$row[user]}，中午好！');window.location.href='/home';</script>");}
	if($ntime>=14 and $ntime<18){exit("<script language='javascript'>alert('{$row[user]}，下午好！');window.location.href='/home';</script>");}
	if($ntime>=18 and $ntime<24){exit("<script language='javascript'>alert('{$row[user]}，晚上好！');window.location.href='/home';</script>");}
		}else{
			echo"<script language='javascript'>alert('账号或密码错误！');window.location.href='/login.php';</script>";
		}
	}
}
//************************执行代码结束**************************
?>
<!DOCTYPE HTML>
<html>
<head>


    


<title>登录—<?=C('dlzc')?>の记忆</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="/assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="/assets/js/jquery-2.1.1.min.js"></script>
<!--icons-css-->
<link href="/assets/css/font-awesome.css" rel="stylesheet">
<!--static chart-->

<link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=2.2.0" rel="stylesheet">

</head>
<body>
<    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <p><font size="+6"><?=C('dlzc')?>の记忆</font></p>

            </div>
           
			<div class="login-block">
				<form action="?act=type" method="post">
<input type="hidden" name="do" value="login"/>
		<input type="hidden" name="type" value="1"/>
				   <input type="text" class="form-control" name="user" placeholder="用户名" required="">
					    <div class="form-group">
                    <input type="password" class="form-control" name="pwd" placeholder="密码" required="">
                </div>
					<div class="forgot-top-grids">
						<div class="forgot-grid">
						</div>
						<div class="forgot">
							<a href="http://wpa.qq.com/msgrd?V=1&Uin=<?=C('webqq')?>&Site=ioshenmue&Menu=yes">密码忘了？点我找回！</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					   <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>


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


                
            
             


					
					
		
				</form>
				
			</div>
      </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->

<!--COPY rights end here-->

<!--scrolling js-->
		<script src="/assets/js/jquery.nicescroll.js"></script>
		<script src="/assets/js/scripts.js"></script>
		<!--//scrolling js-->
<script src="/assets/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>