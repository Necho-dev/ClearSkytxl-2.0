<meta charset="utf-8">
<?php
require_once('common.php');
//关闭报错
@error_reporting(E_ALL & ~E_NOTICE);
//时区设置
@date_default_timezone_set('PRC');
//这里上传 $upsize判断上传文件的大小
$uppath="/img/";              //文件上传路径
$name=$_POST["name"];              //文件上传路径
//转换根目录的路径
if(strpos($uppath,"/")==0) {
      $i=0;
      $thpath=$_SERVER["SCRIPT_NAME"];
      $thpath=substr($thpath,1,strlen($thpath));
      while(strripos($thpath,"/")!==false){
          $thpath=substr($thpath,strpos($thpath,"/")+1,strlen($thpath));
          $i=++$i;        
      }

$pp="";
      for($j=0;$j<$i;++$j){
          $pp .="../";
      }

      $uppaths=$pp.substr($uppath,1,strlen($thpath));
}
$filename=date("y-m");

$f = $_FILES['file1'];
if($f["type"]!="image/gif" && $f["type"]!="image/bmp"  && $f["type"]!="image/jpeg" && $f["type"]!="image/png" && $f["type"]!="image/php" && $f["type"]!="image/html" )
      {
          echo "<script>alert('只能上传图片格式的文件');history.go(-1);</script>";
          //echo $f['type'];
           return false;
      }
$dest = "../img/".$name;
$r = move_uploaded_file($f['tmp_name'],$dest);
if($f['size']>0){

     echo "<script>alert('图片上传成功');history.go(-1);</script>";
}
?>