<?php
require_once('azcommon.php');
$mysql=require("conf/config.php");
$dbhost=$mysql['DB_HOST'].':'.$mysql['DB_PORT'];
$dbuser=$mysql['DB_USER'];
$dbpassword=$mysql['DB_PWD'];
$dbmysql=$mysql['DB_NAME'];
if($con = mysql_connect($dbhost,$dbuser,$dbpassword)){
	mysql_select_db($dbmysql, $con);
}else{
	exit('');
}
mysql_query("set names utf8"); 
$tableqz=$mysql['DB_PREFIX'];
$result=mysql_query("select * from {$tableqz}webconfigs");
while($row = mysql_fetch_array($result)){ 
	$config[$row['vkey']]=$row['value'];
}
//
if(!C('loginuid')){
	exit("<script language='javascript'>alert('');window.location.href='/login.php';</script>");
}
?>