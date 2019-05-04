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
		$vip=is_numeric($_POST['vip'])?$_POST['vip']:'0';
		$peie=is_numeric($_POST['peie'])?$_POST['peie']:'0';
		$vipend=safestr($_POST['vipend']);
		$mail=safestr($_POST['mail']);
		$phone=safestr($_POST['phone']);
		$qq=safestr($_POST['qq']);
		$xm=safestr($_POST['xm']);
		$sr=safestr($_POST['sr']);
		$xz=safestr($_POST['xz']);
		$zz=safestr($_POST['zz']);
		$tc=safestr($_POST['tc']);
		$ah=safestr($_POST['ah']);
		$xb=safestr($_POST['xb']);
		$ch=safestr($_POST['ch']);
		$xh=safestr($_POST['xh']);
		$zw=safestr($_POST['zw']);
    $ktc=safestr($_POST['ktc']);
    $tj=safestr($_POST['tj']);
    $xtj=safestr($_POST['xtj']);
    $active=safestr($_POST['active']);
	$pwd=md5(md5($_POST['pwd']).md5('815856515'));
      $gxqm=safestr($_POST['gxqm']);
		$set="phone='{$phone}',qq='{$qq}',xm='{$xm}',sr='{$sr}',xz='{$xz}',ah='{$ah}',tc='{$tc}',zz='{$zz}',xb='{$xb}',ch='{$ch}',xh='{$xh}',zw='{$zw}',mail='{$mail}',ktc='{$ktc}',tj='{$tj}',xtj='{$xtj}',gxqm='{$gxqm}',pwd='{$pwd}',active='{$active}'";
		/*if($_POST['pwd']){
			$pwd=md5(md5($_POST['pwd']).md5('815856515'));
			$set.=",pwd='{$pwd}'";
		}*/
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
<title>用户修改-<?=C('webname')?> </title>
<body>
<!--main content start-->
  <section id="container" class="">
      <section id="main-content">
          <section class="wrapper">
		   <div class="row">
                  <div class="col-lg-12"> <p>资料修改 </div>
                  <div class="col-lg-12">
                      <section class="panel">
                        <div class="panel-body">
				<form action="?uid=<?=$uid?>&xz=update" class="form-horizontal" method="post">
								<input type="hidden" name="do" value="update">	
                <div class="form-group">
          <label class="col-sm-2 control-label">是否给予头街</label>
          <div class="col-sm-10">
            <label class="radio-inline">
                        <input type="radio" name="xtj" value="1" checked="">是
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="xtj" value="0" <?php if($user['xtj']==0) echo 'checked=""';?>>
                        <font>否</font>
                      </label>
          </div>
        </div>
 
        <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">头街（请先给予头街）</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tj" value="<?=$user['tj']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">姓名</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="xm" value="<?=$user['xm']?>">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">密码（不修改则不填）</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="pwd">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">性别</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="xb" value="<?=$user['xb']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">学号</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="xh" value="<?=$user['xh']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">绰号</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ch" value="<?=$user['ch']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">生日</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="sr" value="<?=$user['sr']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">住址</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="zz" value="<?=$user['zz']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">联系电话</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone" value="<?=$user['phone']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				   <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">联系电话</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="mail" value="<?=$user['mail']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">QQ</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="qq" value="<?=$user['qq']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">职位</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="zw" value="<?=$user['zw']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">星座</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="xz" value="<?=$user['xz']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">爱好</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ah" value="<?=$user['ah']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">特长</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tc" value="<?=$user['tc']?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
          <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">口头禅</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ktc" value="<?=$user['ktc']?>">
                    </div>
                  </div>
                  <div class="line line-dashed line-lg pull-in"></div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">个性签名</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="gxqm" value="<?=$user['gxqm']?>">
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
