<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>下线资料</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="stylesheet" href="/Public/Home/Template/css/mui.min.css">
	<link rel="stylesheet" href="/Public/Home/Template/app.css">
	<script src="/Public/Home/Template/fonts/iconfont.js"></script>
	<style>
		.myjs{
			padding: 0 0 10px 0;
			margin: 0;
			overflow: hidden;
			text-align: center;
			/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#005cd6+0,1383ff+100 */
			background: rgb(0,92,214); /* Old browsers */
			background: -moz-linear-gradient(top,  rgba(0,92,214,1) 0%, rgba(19,131,255,1) 100%); /* FF3.6-15 */
			background: -webkit-linear-gradient(top,  rgba(0,92,214,1) 0%,rgba(19,131,255,1) 100%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(to bottom,  rgba(0,92,214,1) 0%,rgba(19,131,255,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#005cd6', endColorstr='#1383ff',GradientType=0 ); /* IE6-9 */
			-webkit-box-shadow: 0 1px 6px #ccc;
			box-shadow: 0 1px 6px #ccc;
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
		}
		.myjs dl{
			padding:0 ;
			margin: 0;
			text-align: center;
			overflow: hidden;
		}
		.myjs dl dt{
			padding: 0;
			overflow: hidden;
			font-size: 18px;
			font-weight: 300;
			color: #fff;
		}
		.myjs dl dd{
			padding: 0;
			margin: 0;
			overflow: hidden;
			font-size: 20px;
			font-weight: 500;
			line-height: 25px;
			color: #fff;
		}
		.myjs .xxi{
			width: 25%;
			padding: 70px 0 0 0;
			float: left;
		}
		.myjs .xxi dt{
			margin: 0 0 10px 0;
		}
		.myjs .txiuao{
			width: 50%;
			padding: 25px 0 0 0;
			float: left;
		}
		.myjs .txiuao dt{
			margin: 0 0 10px 0;
		}
		.myjs .txiuao .headportrait{width: 50%}
		.myjs .txiuao dd{
			font-size: 12px;
			font-weight: 300;
			line-height: 12px;
			color: #fff;
		}
		.myjs .txiuao dd b{
			font-size: 20px;
			color: #fff;
			line-height: 30px;
		}

		.shijian{
			position: absolute;
			top: 10px;
			right: 15px;
			font-size: 14px;
			font-weight: 400;
			color: #8f8f94;
		}
		.mui-badge-danger .iconfont{font-size: 10px}
		/* 打电话 */
		.sms{
			padding: 20px 0 10px 0;
			margin: 0;
			overflow: hidden;
		}
		.sms ul{
			padding: 0;
			margin: 0 10%;
			overflow: hidden;
		}
		.sms ul li{
			padding:0;
			margin: 0 1%;
			float: left;
			width: 48%;
			overflow: hidden;
		}
		.sms ul li button{
			font-size: 20px;
			width: 100%;
		}
		.shijian b{
			color: #ff0000;
			font-size: 14px;
		}
	</style>
</head>
<body>
<div class="mui-content topws">
	<div class="myjs">
		<dl class="xxi">
			<dt>推广人数</dt>
			<dd><?php echo ($count); ?>人</dd>
		</dl>
		<dl class="txiuao">
			<dt><img class="headportrait round" <?php if($other['img'] == null): ?>src="/Public/Home/Template/images/headportrait.jpg" <?php else: ?> src="<?php echo ($other['img']); ?>"<?php endif; ?>></dt>
			<dd><b><?php echo ($other["name"]); ?></b><br><?php echo ($other["province"]); ?> <?php echo ($other["city"]); echo ($other["area"]); ?></dd>
		</dl>
		<dl class="xxi">
			<dt>推广经理</dt>
			<dd><?php echo ($other["tname"]); ?></dd>
		</dl>
	</div>


	<div class="theme"><dl><dt>推广记录</dt><dd><samp>MY Extension</samp></dd></dl></div>
	<ul class="mui-table-view mui-table-view-chevron">
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
			<a href="<?php echo U('extension_content',array('uid'=>$vo['uid']));?>">
				<span class="shijian">&yen;<b>1.00</b></span>
				<img class="mui-media-object mui-pull-left corners" <?php if($vo['img'] == null): ?>src="/Public/Home/Template/images/headportrait.jpg" <?php else: ?> src="<?php echo ($vo['img']); ?>"<?php endif; ?>>
				<div class="mui-media-body">
					<?php echo ($vo["name"]); ?>
					<p class="mui-ellipsis-2"><?php echo (date("Y年m月d日 H:i",$vo['reg_time'])); ?><br>被您推荐进来，您得到了1元</p>
				</div>
			</a>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
		
	</ul>
</div>
<div class="mui-bar mui-bar-tab">
	<a class="mui-tab-item" href="<?php echo U('index/index');?>"><span class="mui-icon mui-icon-home"></span><span class="mui-tab-label">首页</span></a>
	<a class="mui-tab-item" href="<?php echo U('information/personnel');?>"><span class="mui-icon mui-icon-person"></span><span class="mui-tab-label">人才</span></a>
	<a class="mui-tab-item" href="<?php echo U('information/supply');?>"><span class="mui-icon mui-icon-compose"></span><span class="mui-tab-label">供求</span></a>
	<a class="mui-tab-item" href="<?php echo U('information/rentto');?>"><span class="mui-icon mui-icon-reload"></span><span class="mui-tab-label">租转</span></a>
	<a class="mui-tab-item mui-active" href="<?php echo U('user/my');?>"><span class="mui-icon mui-icon-contact"></span><span class="mui-tab-label">我的</span></a>
</div>
<script src="/Public/Home/Template/js/mui.min.js"></script>
<script>
	mui.init({
		//mui js 代码
	});
	//测试代码
	mui('body').on('tap','a',function(){window.top.location.href=this.href;});
	
</script>
<div style="display: none">统计代码</div>
</body>
</html>