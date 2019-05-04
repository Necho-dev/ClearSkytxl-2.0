<?php
error_reporting(0);
@date_default_timezone_set('PRC');
@header("Content-type:text/html;charset=utf-8");
//判断是否已安装
if(!is_file("./install/install.lock") && is_file("./install/index.php")){
	exit('<script language=\'javascript\'>alert(\'您还未安装\');window.location.href=\'/install/index.php\';</script>');
}
include_once 'libs/360safe/360webscan.php';
include_once 'libs/functions.php';
$mysql = require("conf/config.php");
C($mysql);
include_once 'libs/ez_sql_core.php';
include_once 'libs/ez_sql_mysql.php';
$db = new ezSQL_mysql(C('db_user'), C('db_pwd'), C('db_name'), C('db_host') . ':' . C('db_port'));
$db -> query("set names utf8");
if ($rows = $db -> get_results("select * from " . C('db_prefix') . "webconfigs")) {
	foreach($rows as $row) {
		$webconfig[$row['vkey']] = $row['value'];
	} 
	C($webconfig);
} 
$cookiesid = $_COOKIE['klsf_sid'];
if (preg_match('/^[0-9a-z]{32}$/i', $cookiesid)) {
if ($cookiesid && $userrow = $db -> get_row("select * from " . C('db_prefix') . "users where sid ='$cookiesid' limit 1")) {
	C('loginuser', $userrow['user']);
	C('loginuid', $userrow['uid']);
} 
}
