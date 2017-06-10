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
<link rel="stylesheet" type="text/css" href="/Public/Admin/Css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/Css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/Lib/iconfonts/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/Lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/Skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/Css/style.css" />
<title>台州银刷商务服务有限公司管理平台</title>
<!-- <title><?php echo F('profiles')['company'];?>管理平台</title> -->
 
</head>
<body>
	 
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"><a class="logo navbar-logo f-l mr-10 hidden-xs" href="#">台州银刷商务服务有限公司管理平台</a><span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>你好，管理员
				</ul>
			</nav>
		</div>
	</div>
</header>

<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		<dl id="menu-gonggao">
			<dt><i class="Hui-iconfont">&#xe639;</i> 栏目管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('cate/index');?>" data-title="新闻列表" href="javascript:void(0)">栏目列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-gonggao">
			<dt><i class="Hui-iconfont">&#xe616;</i> 新闻管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('News/index');?>" data-title="新闻列表" href="javascript:void(0)">新闻列表</a></li>
					<li><a _href="<?php echo U('Cate/index');?>" data-title="新闻分类" href="javascript:void(0)">新闻分类</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-gonggao">
			<dt><i class="Hui-iconfont">&#xe627;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Product/index');?>" data-title="产品列表" href="javascript:void(0)">产品列表</a></li>
					<li><a _href="<?php echo U('Pcate/index');?>" data-title="产品分类" href="javascript:void(0)">产品分类</a></li>
				</ul>
			</dd>
		</dl>
		<!-- <dl id="menu-gonggao">
			<dt><i class="Hui-iconfont">&#xe613;</i> 幻灯管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Banner/index');?>" data-title="幻灯列表" href="javascript:void(0)">幻灯列表</a></li>
				</ul>
			</dd>
		</dl> -->
		<!-- <dl id="menu-gonggao">
			<dt><i class="Hui-iconfont">&#xe64b;</i> 友情链接<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Sub/index');?>" data-title="链接列表" href="javascript:void(0)">链接列表</a></li>
				</ul>
			</dd>
		</dl> -->
		<dl id="menu-gonggao">
			<dt><i class="Hui-iconfont">&#xe616;</i> 人才管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Information/index',array('type'=>0));?>" data-title="招聘列表" href="javascript:void(0)">招聘列表</a></li>
					<li><a _href="<?php echo U('Information/index',array('type'=>1));?>" data-title="求职列表" href="javascript:void(0)">求职列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-gonggao">
			<dt><i class="Hui-iconfont">&#xe627;</i> 供求管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Information/index',array('type'=>2));?>" data-title="供应列表" href="javascript:void(0)">供应列表</a></li>
					<li><a _href="<?php echo U('Information/index',array('type'=>3));?>" data-title="求购列表" href="javascript:void(0)">求购列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-gonggao">
			<dt><i class="Hui-iconfont">&#xe64b;</i> 租转管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Information/index',array('type'=>4));?>" data-title="出租列表" href="javascript:void(0)">出租列表</a></li>
					<li><a _href="<?php echo U('Information/index',array('type'=>5));?>" data-title="转让列表" href="javascript:void(0)">转让列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-gonggao">
			<dt><i class="Hui-iconfont">&#xe63c;</i> 网站设置<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Website/profile');?>" data-title="公司信息" href="javascript:void(0)">公司信息</a></li>
					<li><a _href="<?php echo U('Website/contact');?>" data-title="联系我们" href="javascript:void(0)">联系我们</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-caiwu">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Manager/index');?>" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
					<li><a _href="<?php echo U('User/index');?>" data-title="用户列表" href="javascript:void(0)">用户列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-caiwu">
			<dt><i class="Hui-iconfont">&#xe634;</i> <a href="<?php echo U('Index/loginout');?>">退出</a><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt> 
		</dl>
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="<?php echo U('Index/welcome');?>">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?php echo U('Finance/summarize');?>" name="main"></iframe>
		</div>
	</div>
</section>

<script type="text/javascript" src="/Public/Admin/Lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/Lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/Admin/Js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/Admin/Js/H-ui.admin.js"></script> 
<script type="text/javascript">
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s)})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>


 
  
</body>
</html>