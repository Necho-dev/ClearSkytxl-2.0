<?php
require_once('common.php');
require_once('head.php');

$uid=is_numeric($_GET['uid'])?$_GET['uid']:'0';
if($_GET['do']=='del'){
	$db->query("delete from ".C('DB_PREFIX')."users where uid='$uid'");
	echo "<script language='javascript'>alert('删除成功！');</script>";
}
$p=is_numeric($_GET['p'])?$_GET['p']:'1';
$pp=$p+8;
$pagesize=10;
$start=($p-1)*$pagesize;

if($_GET['do']=='search' && $s=safestr($_GET['s'])){
	$pagedo='seach';
	$users=$db->get_results("select * from ".C('DB_PREFIX')."users where uid='{$s}' or user like'%{$s}%' or mail like'%{$s}%' or phone like'%{$s}%' order by (case when uid='{$s}' then 8 else 0 end)+(case when user like '%{$s}%' then 3 else 0 end)+(case when mail like '%{$s}%' then 2 else 0 end)+(case when phone like '%{$s}%' then 1 else 0 end) desc limit 20");
}else{
	$pages=ceil(get_count('users','1=1','uid')/$pagesize);
	$users=$db->get_results("select * from ".C('DB_PREFIX')."users order by uid desc limit $start,$pagesize");
}
if($pp>$pages) $pp=$pages;
if($p==1){
	$prev=1;
}else{
	$prev=$p-1;
}
if($p==$pages){
	$next=$p;
}else{
	$next=$p+1;
}
?>

<!--main content start-->
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
		  <form action="?" class="navbar-right" method="GET">
				<input type="hidden" name="do" value="search">
			</form>
			<h3 class="page-header">用户列表</h3>
			<div class="table-responsive">
				<table class="table table-striped">
				<thead>
				<tr>
					<th>#UID</th>
					<th>用户名</th>
					<th>姓名</th>
					<th>权限</th>
					<th>QQ</th>
					<th>操作</th>
				</tr>
				</thead>
				<tbody>
				<?php if($users){foreach($users as $user){?>
				<tr>
					<td><?=$user[uid]?></td>
					<td><?=$user[user]?></td>
					<td><?=$user[xm]?></td>
					<td><?php
                                   if ($user['active']==9) {
                                   echo "Svip-超级站长";
                                   }elseif ($user['active']==8) {
                                   echo "vip-副站长";
                                   }elseif ($user['active']==7) {
                                    echo "我是老师";
                                    }elseif ($user['active']==6) {
                                    echo "我是班长";
                                   }else{
                                    echo "学生一枚";
                                   }
                                  ?></td>
					<td><?=$user[qq]?></td>
					<td><a href="?do=del&p=<?=$p?>&uid=<?=$user[uid]?>" class="btn btn-danger" onClick="if(!confirm('确认删除？')){return false;}">删除</a>&nbsp;<a href="uset.php?xz=update&uid=<?=$user[uid]?>" class="btn btn-success">修改</a><a href="qx.php?xz=update&uid=<?=$user[uid]?>" class="btn btn-success">权限修改</a></td>
				</tr>
				<?php }}?>
				</tbody>
				</table>
			</div>
			<? if($pagedo!='seach'){?>
			<div class="row" style="text-align:center;">
				<ul class="pagination pagination-lg">
					<li <?php if($p==1){echo'class="disabled"';}?>><a href="?p=1">首页</a></li>
					<li <?php if($prev==$p){echo'class="disabled"';}?>><a href="?p=<?=$prev?>">&laquo;</a></li>
					<?php for($i=$p;$i<=$pp;$i++){?>
					<li <?php if($i==$p){echo'class="active"';}?>><a href="?p=<?=$i?>"><?=$i?></a></li>
					<?php }?>
					<li <?php if($next==$p){echo'class="disabled"';}?>><a href="?p=<?=$next?>">&raquo;</a></li>
					<li <?php if($p==$pages){echo'class="disabled"';}?>><a href="?p=<?=$pages?>">末页</a></li>
				</ul>
			</div>
			<?php } ?>
			
<?php
require_once('foot.php');
?>
  </body>
</html>
