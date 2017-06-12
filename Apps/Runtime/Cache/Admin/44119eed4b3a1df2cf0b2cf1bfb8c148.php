<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<META HTTP-EQUIV="pragma" CONTENT="no-cache"> 
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate"> 
<META HTTP-EQUIV="expires" CONTENT="0">
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" href="/yssw3/Public/Admin/Css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/yssw3/Public/Admin/Css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/yssw3/Public/Admin/Lib/iconfonts/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/yssw3/Public/Admin/Lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/yssw3/Public/Admin/Skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/yssw3/Public/Admin/Css/style.css" />
<title>台州银刷商务服务有限公司管理平台</title>
<!-- <title><?php echo F('profiles')['company'];?>管理平台</title> -->
 
</head>
<body>
	 
<div class="page-container">
	<p class="f-20 text-success">欢迎使用<?php echo F('profiles')['company'];?>管理平台</p>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr class="text-c">
				<th width="100" colspan="2"><h3>系统基本信息</h3></th>
			</tr>
		</thead>
		<?php if(is_array($server_info)): $i = 0; $__LIST__ = $server_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody>
			<tr class="text-c">
				<td><?php echo ($key); ?></td>
				<td><?php echo ($vo); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>Copyright &copy;2017 <?php echo F('profile')['company'];?> All Rights Reserved.<br>
			本站由<a href="www.naerkeji.com" target="_blank" title="纳尔科技">纳尔科技</a>提供技术支持</p>
	</div>
</footer>


 
  
</body>
</html>