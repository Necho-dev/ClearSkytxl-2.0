<?php
require_once('common.php');
require_once('head.php');
//************************执行代码开始*************************
if(!in_array($userrow["active"],array("5"))){
	exit("<script language='javascript'>alert('你不是课代表');window.location.href='/';</script>" );
}
if($do=$_POST['do']){
	foreach($_POST as $k=> $value){
		$db->query("insert into ".C('DB_PREFIX')."webconfigs set vkey='".safestr($k)."',value='".safestr($value)."' on duplicate key update value='".safestr($value)."'");
	}
	if($rows=$db->get_results("select * from ".C('DB_PREFIX')."webconfigs")){
		foreach($rows as $row){
			$webconfig[$row['vkey']]=$row['value'];
		}
		C($webconfig);
	}

	echo"<script language='javascript'>alert('保存成功！');</script>";
}





//**************************执行代码开始*******************************
?>


<!--main content start-->
 <body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
                   <div class="col-lg-12">
                         <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        布置作业
                                    </div>
                          <div class="panel-body"> 
                          <p><form action="?xz=set" class="form-horizontal" method="post">
           <input type="hidden" name="do" value="set">
           
          
              <div class="form-group">
                  <label class="col-sm-2 control-label">语文作业</label>
                  <textarea class="form-control" name="ywzy" rows="3" value=""><?=C('ywzy')?></textarea>
                </div>
        <div class="line line-dashed line-lg pull-in"></div>
        <div class="form-group">
                  <label class="col-sm-2 control-label">数学作业</label>
                  <textarea class="form-control" name="sxzy" rows="3" value=""><?=C('sxzy')?></textarea>
                </div>
        <div class="line line-dashed line-lg pull-in"></div>
        <div class="form-group">
                  <label class="col-sm-2 control-label">英语作业</label>
                  <textarea class="form-control" name="yyzy" rows="3" value=""><?=C('yyzy')?></textarea>
                </div>
        <div class="line line-dashed line-lg pull-in"></div>
        <div class="form-group">
                  <label class="col-sm-2 control-label">物理作业</label>
                  <textarea class="form-control" name="wlzy" rows="3" value=""><?=C('wlzy')?></textarea>
                </div>
        <div class="line line-dashed line-lg pull-in"></div>
        
        <div class="form-group">
                  <label class="col-sm-2 control-label">化学作业</label>
                  <textarea class="form-control" name="hxzy" rows="3" value=""><?=C('hxzy')?></textarea>
                </div>
        <div class="line line-dashed line-lg pull-in"></div>
        <div class="form-group">
                  <label class="col-sm-2 control-label">历史作业</label>
                  <textarea class="form-control" name="lszy" rows="3" value=""><?=C('lszy')?></textarea>
                </div>
        <div class="line line-dashed line-lg pull-in"></div>
        <div class="form-group">
                  <label class="col-sm-2 control-label">政治作业</label>
                  <textarea class="form-control" name="zzzy" rows="3" value=""><?=C('zzzy')?></textarea>
                </div>
        <div class="line line-dashed line-lg pull-in"></div>
        <div class="line line-dashed line-lg pull-in"></div>
        
        <div class="form-group">
                  <label class="col-sm-2 control-label">当前时间</label>
                  <textarea class="form-control" name="bzsj" rows="3" value=""><?php

echo date('Y-m-d H:i:s')
?> </textarea>
                </div>

        <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group">
                    <div align="center">
                      <button type="submit" class="btn btn-primary">布置！</button></p>             
              </div>
                <?php
require_once('foot.php');
?>
  </body>
</html>