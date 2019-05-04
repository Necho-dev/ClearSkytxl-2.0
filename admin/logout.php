<?php
require_once('common.php');
$newsid=md5(uniqid().rand(1,1000));
$db->query("update ".C('DB_PREFIX')."users set sid='$newsid' where uid='{$userrow['uid']}'");
setcookie("klsf_sid","",-1,'/');
exit("<script>alert('成功退出登录！'); location.reload();</script>");
?>