<?php
require_once('common.php');
require_once('head.php');
$uid=is_numeric($_GET['uid'])?$_GET['uid']:'0';
if(!$uid || !$user=$db->get_row("select * from ".C('DB_PREFIX')."users where uid='$uid' limit 1")){
	exit("<script language='javascript'>alert('用户不存在！');window.location.href='user.php';</script>");
}
if($do=$_POST['do']){
	$rmb=is_numeric($_POST['rmb'])?$_POST['rmb']:'0';
	if($do=='update'){
		
    $active=safestr($_POST['active']);

		$set="active='{$active}'";
	
		$db->query("update ".C('DB_PREFIX')."users set {$set} where uid='$uid'");
		echo"<script language='javascript'>alert('修改成功');</script>";
	}elseif($do=='re'){
		$db->query("update ".C('DB_PREFIX')."users set rmb=rmb+{$rmb} where uid='$uid'");
		echo"<script language='javascript'>alert('成功充值{$rmb}元');</script>";
	}elseif($do=='cut'){
		$db->query("update ".C('DB_PREFIX')."users set rmb=rmb-{$rmb} where uid='$uid'");
		echo"<script language='javascript'>alert('成功扣取{$rmb}元');</script>";
	}elseif($do=='vip'){
		$ms=is_numeric($_POST['ms'])?$_POST['ms']:'1';
		if(get_isvip($user[vip],$user[vipend])){
			$vipend=date("Y-m-d",strtotime("+ $ms months",strtotime($user[vipend])));
			$db->query("update ".C('DB_PREFIX')."users set vip=1,vipend='{$vipend}' where uid='$uid'");
			echo"<script language='javascript'>alert('成功为他续费{$ms}个月VIP');</script>";
		}else{
			$vipend=date("Y-m-d",strtotime("+ $ms months"));
			$db->query("update ".C('DB_PREFIX')."users set vip=1,vipstart='".date("Y-m-d")."',vipend='{$vipend}' where uid='$uid'");
			echo"<script language='javascript'>alert('成功为他开通{$ms}个月VIP');</script>";
		}
	}
	$user=$db->get_row("select * from ".C('DB_PREFIX')."users where uid='$uid' limit 1");
}





?>

<!DOCTYPE html>
<title>权限修改-<?=C('webname')?> </title>
<body>
<!--main content start-->
  <section id="container" class="">
      <section id="main-content">
          <section class="wrapper">
		   <div class="row">
                  <div class="col-lg-12"> <p>权限修改 </div>
                  <div class="col-lg-12">
                      <section class="panel">
                        <div class="panel-body">
				<form action="?uid=<?=$uid?>&xz=update" class="form-horizontal" method="post">
								<input type="hidden" name="do" value="update">	
                
 <div class="form-group">
          <label class="col-sm-2 control-label">给予权限</label>
          <div class="col-sm-10">
            <label class="radio-inline">
                        <input type="radio" name="active" value="8" checked="">副站长
                      </label><br>
     <label class="radio-inline">
                        <input type="radio" name="active" value="7" checked="">老师
                      </label><br>
     <label class="radio-inline">
                        <input type="radio" name="active" value="6" checked="">班长
                      </label><br>
                       <label class="radio-inline">
                        <input type="radio" name="active" value="0" <?php if($user['xtj']==0) echo 'checked=""';?>>
                        普通学生
                      </label>
          </div>
        </div>
        
                  <div class="line line-dashed line-lg pull-in"></div>
                  <div class="form-group">
                    <div align="center">
                      <button type="submit" class="btn btn-primary">确定修改</button>
                    </div>
                  </div>
                </form>
              </div>
<?php
require_once('foot.php');
?>
  </body>
</html>