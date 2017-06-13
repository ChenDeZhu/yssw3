<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>我的推广</title>
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

		/* 推广 */
		.mymachine{
			margin: 10px 0 0 0;
			padding: 0;
			overflow: hidden;
			border-top: rgba(228, 228, 230, 0.51) 1px solid;
			border-bottom: #E4E4E6 1px solid;
			background-color: #fff;
		}
		.mymachine dl{
			margin: 0;
			padding:25px 10px 20px 10px;
			overflow: hidden;
			text-align: center;
		}
		.mymachine dl dt{
			margin: 0 0 15px 0;
			padding: 0;
			overflow: hidden;
			font-size: 18px;
			font-weight: 300;
		}
		.mymachine dl dt svg{
			margin: 0;
			padding: 0;
			overflow: hidden;
			font-size: 20px;
			font-weight: 300;
		}
		.mymachine dl dd{
			margin: 0;
			padding:0;
			overflow: hidden;
			font-size:  12px;
			font-weight: 300;
			color: #A6A6A6;
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
		 <?php if($user['img'] == null): ?><dt><img class="headportrait round" src="/Public/Home/Template/images/headportrait.jpg"></dt>
			<?php else: ?>
			<dt><img class="headportrait round" src="<?php echo ($user['img']); ?>" ></dt><?php endif; ?>
			<dd><b><?php echo ($user["name"]); ?></b><br><?php echo ($user['province']); ?> <?php echo ($user['citye']); ?> <?php echo ($user['area']); ?></dd>
		</dl>
		<dl class="xxi">
			<dt>推广佣金</dt>
			<dd>300元</dd>
		</dl>
	</div>

	<div class="mymachine">
		<dl>
			<dt><svg class="icon" aria-hidden="true"><use xlink:href="#icon-diploma_1"></use></svg> 我的推广二维码</dt>
			<dd>
				<svg class="icon" aria-hidden="true"><use xlink:href="#icon-multiple_inputs"></use></svg> 分享本页到朋友圈
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<svg class="icon" aria-hidden="true"><use xlink:href="#icon-parallel_tasks"></use></svg> 获取二维码推广
			</dd>
		</dl>
	</div>

	<div class="theme"><dl><dt>推广记录</dt><dd><samp>MY Extension</samp></dd></dl></div>
	<ul class="mui-table-view mui-table-view-chevron">\
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
			<a href="extension_content.html">
				<span class="shijian">&yen;<b>1.00</b></span>
				<img class="mui-media-object mui-pull-left corners" <?php if($v['img'] == null): ?>src="/Public/Home/Template/images/headportrait.jpg" <?php else: ?> src="<?php echo ($v['img']); ?>"<?php endif; ?>>
				<div class="mui-media-body">
					<?php echo ($v["name"]); ?>
					<p class="mui-ellipsis-2"><?php echo (date("Y年m月d日 H:i",$v['reg_time'])); ?><br>被您推荐进来，您得到了1元</p>
				</div>
			</a>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
				<a href="extension_content.html">
					<span class="shijian">&yen;<b>1.00</b></span>
					<img class="mui-media-object mui-pull-left corners"  <?php if($v['img'] == null): ?>src="/Public/Home/Template/images/headportrait.jpg" <?php else: ?> src="<?php echo ($v['img']); ?>"<?php endif; ?>>
					<div class="mui-media-body">
						<?php echo ($v["name"]); ?>
						<p class="mui-ellipsis-2"><?php echo (date("Y年m月d日 H:i",$v['reg_time'])); ?><br>被<?php echo ($v["tname"]); ?>推荐进来，您得到了1元</p>
					</div>
				</a>
			</li><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
		
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
    //微信代码
    // document.getElementById('home').addEventListener('tap', function() {window.location.href="index.html";});
    // document.getElementById('nearby').addEventListener('tap', function() {window.location.href="near_task.html";});
    // document.getElementById('sms').addEventListener('tap', function() {window.location.href="sms_list.html";});
    // document.getElementById('my').addEventListener('tap', function() {window.location.href="my.html";});
</script>
<div style="display: none">统计代码</div>
</body>
</html>