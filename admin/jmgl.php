<?php
require_once('common.php');
require_once('head.php');
?>
<body class="gray-bg">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title" align="center">首页图片上传提示（小白站长必读）</h3>
        </div>
        <div class="panel-body" align="left">
          <p>1.允许的格式：image/jpg（必须与原文件格式相符/后续会加行首页模板改用其他格式）</p>
          <p>2.上传图片后会自动更改首页图片！</p>
      <p>3、上传图片失败请联系作者改进</p>
          <strong>Ps：请勿上传黄色违法图片！违者必究</strong>
        </div>
      </div>
    </div>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
<table style="width:100%;" cellpadding="2" cellspacing="0" border="1" bordercolor="#000000">
	<tbody>
		<tr>
			<td>
				模板（View2）首页背景/.jpg格式
			</td>
			<td>
				<form name="form1" method="post" action="sc.php" enctype="multipart/form-data">
          <input type="hidden" name="name" value="hero1.jpg">
										<input type="file" name="file1" size="20" class="tx1" value="">
								<input type="submit" name="submit" value="点击上传" class="btn btn-primary form-control">
								</form>
			</td>
		</tr>
		<tr>
			<td>
				模板（View1）首页背景/.jpg格式
			</td>
			<td>
				<form name="form1" method="post" action="sc.php" enctype="multipart/form-data">
          <input type="hidden" name="name" value="hero2.jpg">
										<input type="file" name="file1" size="20" class="tx1" value="">
								<input type="submit" name="submit" value="点击上传" class="btn btn-primary form-control">

								</form>
			</td>
		</tr>
<tr>
			<td>
				一起看Vip电影-背景/.jpg格式
			</td>
			<td>
				<form name="form1" method="post" action="sc.php" enctype="multipart/form-data">
          <input type="hidden" name="name" value="vipbz.jpg">
										<input type="file" name="file1" size="20" class="tx1" value="">
								<input type="submit" name="submit" value="点击上传" class="btn btn-primary form-control">

								</form>
			</td>
		</tr>


	</tbody>
</table>
<br />
<?php
require_once('foot.php');
?>
