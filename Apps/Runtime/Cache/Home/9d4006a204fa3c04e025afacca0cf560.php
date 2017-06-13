<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>我的机器</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="/Public/Home/Template/css/mui.min.css">
		<link rel="stylesheet" href="/Public/Home/Template/app.css">
		<script src="/Public/Home/Template/fonts/iconfont.js"></script>
		<style>
			.shijian{
				position: absolute;
				top: 10px;
				right: 15px;
				font-size: 12px;
				font-weight: 400;
				color: #8f8f94;
			}
			.xiaoxi{
				position: absolute;
				top: 8px;
				left: 45px;
				font-size: 10px;
				font-weight: 300;
				line-height: 18px;
				color: #fff;
				background: #ff0000;
				width: 18px;
				height: 18px;
				text-align: center;
				-moz-border-radius: 50%;
				-webkit-border-radius: 50%;
				border-radius:50%;
			}
			.shijian b{
				color: #ff0000;
				font-size: 14px;
			}
			.mui-media-body samp{
				font-size: 12px;
			}

			.type{
				padding:  10px 10px 10px 0 ;
				border-top: rgba(228, 228, 230, 0.51) 1px solid;
				margin: 0;
				overflow: hidden;
				overflow-x: scroll;
			}
			.type ul{
				padding:0;
				margin: 0;
				overflow: hidden;
				width: 800px;
			}
			.type ul li{
				padding: 0 5px;
				border-right:  rgba(228, 228, 230, 0.51) 1px solid;
				margin: 0;
				overflow: hidden;
				float: left;
			}
			.type .no{
				color: #ff0000;
			}
			.shijian{
				position: absolute;
				top: 10px;
				right: 15px;
				font-size: 12px;
				font-weight: 400;
				color: #8f8f94;
			}
			.shijian b{
				color: #ff0000;
				font-size: 14px;
			}
		</style>
	</head>
	<body>
	<header class="mui-bar mui-bar-nav">
		<div class="type">
			<ul>
				<a href="rentto.html" class="no"><li>类别</li></a>
				<a href="rentto.html"><li>类别</li></a>
				<a href="rentto.html"><li>类别</li></a>
				<a href="rentto.html"><li>类别</li></a>
				<a href="rentto.html"><li>类别</li></a>
				<a href="rentto.html"><li>类别</li></a>
				<a href="rentto.html"><li>类别</li></a>
				<a href="rentto.html"><li>类别</li></a>
				<a href="rentto.html"><li>类别</li></a>
			</ul>
		</div>
	</header>
	<div class="mui-content topws">

		<ul class="mui-table-view mui-table-view-chevron productlb">

			<li class="mui-table-view-cell mui-media">
				<span class="shijian">&yen <b>2000.00</b></span>
				<a class="mui-navigate-right" href="product_content.html">
					<img class="mui-media-object mui-pull-left" src="/Public/Home/Template/images/p-5.jpg">
					<div class="mui-media-body">
						转让信息
						<div class="parameter">
							<dl><dt>频道</dt><dd>转让</dd></dl>
							<dl><dt>类别</dt><dd>厂房</dd></dl>
							<dl><dt>日期</dt><dd>2016年6月06日</dd></dl>
						</div>
					</div>
				</a>
			</li>
			<li class="mui-table-view-cell mui-media">
				<span class="shijian">&yen <b>2000.00</b></span>
				<a class="mui-navigate-right" href="product_content.html">
					<img class="mui-media-object mui-pull-left" src="/Public/Home/Template/images/p-6.jpg">
					<div class="mui-media-body">
						出租信息
						<div class="parameter">
							<dl><dt>频道</dt><dd>出租</dd></dl>
							<dl><dt>类别</dt><dd>房子</dd></dl>
							<dl><dt>日期</dt><dd>2016年6月06日</dd></dl>
						</div>
					</div>
				</a>
			</li>
		</ul>
	</div>
<div class="mui-bar mui-bar-tab">
	<a class="mui-tab-item" href="<?php echo U('index/index');?>"><span class="mui-icon mui-icon-home"></span><span class="mui-tab-label">首页</span></a>
	<a class="mui-tab-item" href="<?php echo U('information/personnel');?>"><span class="mui-icon mui-icon-person"></span><span class="mui-tab-label">人才</span></a>
	<a class="mui-tab-item" href="<?php echo U('information/supply');?>"><span class="mui-icon mui-icon-compose"></span><span class="mui-tab-label">供求</span></a>
	<a class="mui-tab-item mui-active" href="<?php echo U('information/rentto');?>"><span class="mui-icon mui-icon-reload"></span><span class="mui-tab-label">租转</span></a>
	<a class="mui-tab-item" href="<?php echo U('user/my');?>"><span class="mui-icon mui-icon-contact"></span><span class="mui-tab-label">我的</span></a>
</div>
<script src="/Public/Home/Template/js/mui.min.js"></script>
<script>
    mui.init({
        //mui js 代码
    });
    //测试代码
    mui('body').on('tap','a',function(){window.top.location.href=this.href;});
    //微信代码
   
</script>
<div style="display: none">统计代码</div>
</body>
</html>