
<?php
require_once('common.php');
require_once('head.php');
//************************执行代码开始*************************

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
		  <div class="row">
            
                  <div class="col-lg-12">
                  <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        在这里修改网站的信息吧
                                    </div>
                        <div class="panel-body">
				<form action="?xz=set" class="form-horizontal" method="post">
	                
					 <input type="hidden" name="do" value="set">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">网站标题</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="<?=C('name')?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">浏览器标题</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="webname" value="<?=C('webname')?>">
                    </div>
                  </div>
 <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">网站版权</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="webbq" value="<?=C('webbq')?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">班级密匙</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="bjmm" value="<?=C('bjmm')?>">
                    </div>
                  </div>
  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">工具A名称</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="yx4" value="<?=C('yx4')?>">
                    </div>
                  </div>
  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">工具A外链</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="yx4wl" value="<?=C('yx4wl')?>">
                    </div>
                  </div>
  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">学校|班级（必填*）</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="zbsqm" value="<?=C('zbsqm')?>">
                    </div>
      <div align="center">Ps：输入你的学校和班级，中间用“|”隔开，字符不要太长或太短</div>
                </div>
  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">登录/注册页面主显文字（如班号）</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="dlzc" value="<?=C('dlzc')?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">站长の扣扣</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="webqq" value="<?=C('webqq')?>">
                    </div>
                  </div>
				  <div class="line line-dashed line-lg pull-in"></div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">站长の邮箱</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="webmail" value="<?=C('webmail')?>">
                    </div>
                  </div>
 <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">站长の手机</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="webphone" value="<?=C('webphone')?>">
                    </div>
                  </div>
 <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">首页BGM（网易云单曲ID）</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="symusic" value="<?=C('symusic')?>">
                    </div>
<div align="center">Ps：网易云单曲ID与歌单ID不同，混用可能造成播放器加载失败无法播放</div>
                  </div>
<div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">内页BGM（网易云歌单ID）</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="music" value="<?=C('music')?>">
                    </div>
                  </div>

				  <div class="line line-dashed line-lg pull-in"></div>
				   <div class="form-group">

			<div class="input-group">
              <span class="input-group-addon">更换模板</span>
			<select class="form-control" name="symb" default="<?=C('symb')?>"><option value="1">View1</option><option value="2">View2</option></select>
            </div><br/>
<div align="center">Ps：此功能还不成熟，处于首测阶段，目前只有两个模板仅供选择</div>
          
          <div class="col-sm-10">
            <label class="radio-inline">
</div>

                  
                  </div>
      
        <div class="line line-dashed line-lg pull-in"></div>
          <div class="form-group">
          <label class="col-sm-2 control-label">是否开启开放注册</label>
          <div class="col-sm-10">
            <label class="radio-inline">
                        <input type="radio" name="zc" value="1" checked="">开启
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="zc" value="0" <?php if(C('zc')==0) echo 'checked=""';?>>
                        <font>关闭</font>
                      </label>
          </div>
        </div>

		
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
