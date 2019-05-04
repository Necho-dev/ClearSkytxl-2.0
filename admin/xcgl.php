  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"; />  

<?php

require_once('common.php');
require_once('head.php');
$id=is_numeric($_GET['id'])?$_GET['id']:'0';
if($_GET['do']=='del'){
	$db->query("delete from ".C('DB_PREFIX')."xc where id='$id'");
	echo "<script language='javascript'>alert('删除成功！');window.location.href='xcgl.php';</script>";
}
$p=is_numeric($_GET['p'])?$_GET['p']:'1';
$pp=$p+8;
$pagesize=5;
$start=($p-1)*$pagesize;

	$pages=ceil(get_count('xc','1=1','id')/$pagesize);
	$ids=$db->get_results("select * from ".C('DB_PREFIX')."xc order by id desc limit $start,$pagesize");

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
error_reporting(0);


/****************************************************************************** 
 作者：爪爪
参数说明: 
$max_file_size  : 上传文件大小限制, 单位BYTE 
$destination_folder : 上传文件路径 
$watermark   : 是否附加水印(1为加水印,其他为不加水印); 
 
使用说明: 
1. 将PHP.INI文件里面的"extension=php_gd2.dll"一行前面的;号去掉,因为我们要用到GD库; 
2. 将extension_dir =改为你的php_gd2.dll所在目录; 
******************************************************************************/  
  
//上传文件类型列表  
$uptypes=array(  
    'image/jpg',  
    'image/jpeg',  
    'image/png',  
    'image/pjpeg',  
    'image/gif',  
    'image/bmp',  
    'image/x-png'  
);  
  
$max_file_size=2000000;     //上传文件大小限制, 单位BYTE  
$destination_folder="../photos/"; //上传文件路径  
$watermark=0;      //是否附加水印(1为加水印,其他为不加水印);  
$watertype=1;      //水印类型(1为文字,2为图片)  
$waterposition=1;     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);  
$waterstring="by zhuazi qq524430375";  //水印字符串  
$waterimg="1.jpg";    //水印图片  
$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);  
$imgpreviewsize=1/1;    //缩略图比例  

?>  
<html>  
<head>  
<title>相册管理-<?=C('webname')?></title>  
<style type="text/css">  
<!--  
body{
    float: left;
}

input  
{  
     background-color: #66CCFF;  
     border: 1px inset #CCCCCC;  
}  
.a{
    float: left;
    

}
-->  
</style>  
<link rel="stylesheet" type="text/css" href="1.css">
</head>  
  
<body class="gray-bg">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title" align="center">相片上传提示</h3>
        </div>
        <div class="panel-body" align="left">
          <p>1.允许的格式：image/jpg, image/jpeg, image/png, image/pjpeg, image/gif, image/bmp, image/x-png</p>
          <p>2.上传图片后会自动发布到相册里面！</p>
      <p>3、删除照片失败请联系作者改进</p>
          <strong>请勿上传黄色违法图片！略略略</strong>
        </div>
      </div>
    </div>
     
			<div class="wrapper wrapper-content animated fadeInRight">
		<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>上传照片<small>请先阅读上述警告，别怪我没提醒你O</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
			<div class="ibox-content">
                        <div class="row">
						<div id="collapseshop" class="panel-body">
							<form enctype="multipart/form-data" method="post" name="upform"> 
								<input type="hidden" name="do" value="edit">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="field-2">选取文件</label>
									<div class="col-sm-9">
										<input class="form-control" type="file" name="upfile">
									</div>
									<span class="pull-right">请上传图片格式文件！</span>
									<button class="btn btn-success " type="submit"><i class="fa fa-upload"></i>点我<span class="bold">上传</span>
								</div>
								
								<div class="hr-line-dashed"></div>
                           
							</form>
						</div>
					</div>
				</div>
			
			</div></div>


</div>
	</div>
	 <div class="wrapper wrapper-content animated fadeInRight">
		<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>相册列表<small></small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
		  <form action="?" class="navbar-right" method="GET">
				<input type="hidden" name="do" value="search">
			</form>
			<h3 class="page-header">相册列表</h3>
			<div class="table-responsive">
				<table class="table table-striped">
				<thead>
				<tr>
					<th>#PID</th>
					<th>目录</th>
					<th>地址</th>
				</tr>
				</thead>
				<tbody>
				<?php if($ids){foreach($ids as $id){?>
				<tr>
					<td><?=$id[id]?></td>
					<td><?=$id[dz]?></td>
					<td><a href="<?=$_SEVER['HTTP_NAME']?><?=$id[dz]?>"><?=$_SEVER['HTTP_NAME']?><?=$id[dz]?></a></td>
					<td><a href="?do=del&p=<?=$p?>&id=<?=$id[id]?>" class="btn btn-danger" onClick="if(!confirm('确认删除？')){return false;}">删除</a>�<a href="uset.php?xz=update&uid=<?=$user[uid]?>" class="btn btn-success">修改</a></td>
				</tr>
				<?php }}?>
				</tbody>
				</table>
			</div>
			<? if($pagedo!='seach'){?>
			<div class="row" style="text-align:center;">
				<ul class="pagination pagination-lg">
					<li <?php if($p==1){echo'class="disabled"';}?>><a href="?p=1">首页</a></li>
					<li <?php if($prev==$p){echo'class="disabled"';}?>><a href="?p=<?=$prev?>">《</a></li>
					<?php for($i=$p;$i<=$pp;$i++){?>
					<li <?php if($i==$p){echo'class="active"';}?>><a href="?p=<?=$i?>"><?=$i?></a></li>
					<?php }?>
					<li <?php if($next==$p){echo'class="disabled"';}?>><a href="?p=<?=$next?>">》</a></li>
					<li <?php if($p==$pages){echo'class="disabled"';}?>><a href="?p=<?=$pages?>">末页</a></li>
				</ul>
			</div>
			<?php } ?>

  
<?php  
if ($_SERVER['REQUEST_METHOD'] == 'POST')  
{  
   // if (!is_uploaded_file($_FILES["upfile"][tmp_name]))  
    //是否存在文件  
    {  
         //echo "图片不存在!";  
         //exit;  
    }  
  
    $file = $_FILES["upfile"];  
    if($max_file_size < $file["size"])  
    //检查文件大小  
    {  
        echo "文件太大!";  
        exit;  
    }  
  
   if(!in_array($file["type"], $uptypes))  
    //检查文件类型  
    {  
        echo "文件类型不符!".$file["type"];  
        exit;  
    } 
  
    if(!file_exists($destination_folder))  
    {  
        mkdir($destination_folder);  
    }  
  
    $filename=$file["tmp_name"];  
    $image_size = getimagesize($filename);  
    $pinfo=pathinfo($file["name"]);  
    $ftype=$pinfo['extension'];  
    $destination = $destination_folder.time().".".$ftype;  
    if (file_exists($destination) && $overwrite != true)  
    {  
        echo "同名文件已经存在了";  
        exit;  
    }  
  
    if(!move_uploaded_file ($filename, $destination))  
    {  
        echo "移动文件出错";  
        exit;  
    }  
  
    $pinfo=pathinfo($destination);  
    $fname=$pinfo[basename];  
    echo " <font color=red>已经成功上传</font><br>文件名:/  <font color=blue>".$destination_folder.$fname."</font><br>";  
    echo " 宽度:".$image_size[0];  
    echo " 长度:".$image_size[1];  
    echo "<br> 大小:".$file["size"]." bytes";  
  
    if($watermark==1)  
    {  
        $iinfo=getimagesize($destination,$iinfo);  
        $nimage=imagecreatetruecolor($image_size[0],$image_size[1]);  
        $white=imagecolorallocate($nimage,255,255,255);  
        $black=imagecolorallocate($nimage,0,0,0);  
        $red=imagecolorallocate($nimage,255,0,0);  
        imagefill($nimage,0,0,$white);  
        switch ($iinfo[2])  
        {  
            case 1:  
            $simage =imagecreatefromgif($destination);  
            break;  
            case 2:  
            $simage =imagecreatefromjpeg($destination);  
            break;  
            case 3:  
            $simage =imagecreatefrompng($destination);  
            break;  
            case 6:  
            $simage =imagecreatefromwbmp($destination);  
            break;  
            default:  
            die("不支持的文件类型");  
            exit;  
        }  
  
        imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);  
        imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);  
  
        switch($watertype)  
        {  
            case 1:   //加水印字符串  
            imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);  
            break;  
            case 2:   //加水印图片  
            $simage1 =imagecreatefromgif("xplore.gif");  
            imagecopy($nimage,$simage1,0,0,0,0,85,15);  
            imagedestroy($simage1);  
            break;  
        }  
  
        switch ($iinfo[2])  
        {  
            case 1:  
            //imagegif($nimage, $destination);  
            imagejpeg($nimage, $destination);  
            break;  
            case 2:  
            imagejpeg($nimage, $destination);  
            break;  
            case 3:  
            imagepng($nimage, $destination);  
            break;  
            case 6:  
            imagewbmp($nimage, $destination);  
            //imagejpeg($nimage, $destination);  
            break;  
        }  
  
        //覆盖原上传文件  
        imagedestroy($nimage);  
        imagedestroy($simage);  
    }  
  
    if($imgpreview==1)  
    {  
    echo "<br>图片预览:<br>";  
    echo "<img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);  
    echo " alt=\"图片预览:\r文件名:"."/".$destination."\r上传时间:\">";  
    } 
    if ($db->query("insert into  ".C('DB_PREFIX')."xc (dz,ms) values ('$destination','1234')")) {
      exit("<script language='javascript'>alert('发布成功！');</script>");
    }else{
      exit("<script language='javascript'>alert('发布失败！');</script>");
    }

}  
?>  
<?php


require_once('foot.php');
?>
</body>  
</html>  