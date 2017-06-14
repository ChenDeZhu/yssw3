<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title><?php echo ($info['tname']); ?>详情</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="/Public/Home/Template/css/mui.min.css">
		<link rel="stylesheet" href="/Public/Home/Template/app.css">
		<script src="/Public/Home/Template/fonts/iconfont.js"></script>
		<style>
			.app_machine{
				padding: 0;
				margin: 0;
				overflow: hidden;
				background: #fff;
				position:relative;
			}
			.app_machine dl{
				padding: 30px 0 20px 0;
				margin: 0 100px 0 10px ;
				overflow: hidden;
			}
			.app_machine dl dt{
				padding: 0;
				margin: 0 0 10px 0;
				overflow: hidden;
				font-size: 20px;
				line-height: 20px;
				font-weight: 900;
			}
			.app_machine dl dd{
				padding: 0;
				margin: 0;
				overflow: hidden;
				font-size: 14px;
				color: #A6A6A6;
			}
			.app_machine .machine_img{
				padding: 0;
				margin: 0;
				overflow: hidden;
				line-height: 63px;
				max-width: 63px;
				height: 63px;
				position:absolute;z-indent:2;right:10px;top:20px;
				-webkit-box-shadow: 0 1px 6px #ccc;
				box-shadow: 0 1px 6px #ccc;
			}
			.app_introduce{
				padding: 0 10px ;
				margin: 0;
				overflow: hidden;
				background: #fff;
			}
			.app_introduce dl{
				padding: 10px 0 ;
				line-height: 30px;
				margin: 0;
				border-top: rgba(228, 228, 230, 0.51) 1px solid;
				overflow: hidden;
			}
			.app_introduce dl dt{
				padding: 0;
				margin: 0 ;
				overflow: hidden;
				color: #232323;
				width: 30%;
				float: left;
				font-weight: 500;
			}
			.app_introduce dl dd{
				padding: 0;
				margin: 0;
				overflow: hidden;
				font-size: 18px;
				font-weight: 300;
				color: #8F8F8F;
				width: 70%;
				float: left;
			}
			.app_introduce dl dd b{
				font-size: 18px;
				font-weight: 900;
				color: #ff0000;
			}
			.app_introduce dl dd img{
				padding: 0;
				margin: 0;
				overflow: hidden;
				height:30px;
				width: auto;
			}
			.describe{
				padding: 10px 0;
				margin: 0;
				overflow: hidden;
				font-size: 18px;
				font-weight: 300;
				color: #323232;
			}
			.describeimg{
				padding:  10px 10px 10px 0 ;
				border-top: rgba(228, 228, 230, 0.51) 1px solid;
				margin: 0;
				overflow: hidden;
				overflow-x: scroll;
			}
			.describeimg ul{
				padding:0;
				margin: 0;
				overflow: hidden;
				width: 800px;
			}
			.describeimg ul li{
				padding: 0 5px;
				border-right:  rgba(228, 228, 230, 0.51) 1px solid;
				margin: 0;
				width: 200px;
				overflow: hidden;
				float: left;
			}
			.describeimg ul li img{
				padding: 0;
				margin: 0;
				overflow: hidden;
				width: 100%;
			}
			.video{
				padding: 10px 0;
				border-top: rgba(228, 228, 230, 0.51) 1px solid;
				margin: 0;
				overflow: hidden;
			}
			.video video{
				padding: 0;
				margin: 0;
				width: 100%;
				height: 30vh;
				overflow: hidden;
				background: rgba(0, 0, 0, 0.2);
			}
			.data{
				padding: 10px 0;
				margin: 0;
				overflow: hidden;
			}
			.data dl{
				padding: 10px 0 ;
				line-height: 20px;
				margin: 0;
				border-top: rgba(228, 228, 230, 0.51) 1px solid;
				overflow: hidden;
			}
			.data dl dt{
				padding: 0;
				margin: 0 ;
				overflow: hidden;
				color: #8F8F8F;
				width: 30%;
				float: left;
				font-size: 14px;
				font-weight: 300;
			}
			.data dl dd{
				padding: 0;
				margin: 0;
				overflow: hidden;
				font-size: 16px;
				font-weight: 300;
				color: #232323;
				width: 70%;
				float: left;
			}
			/*个人信息*/
			.shijian{
				position: absolute;
				top: 10px;
				right: 15px;
				font-size: 14px;
				font-weight: 400;
				color: #8f8f94;
			}
			.mui-badge-danger .iconfont{font-size: 10px}
			.map{padding:  0;  margin: 0 0 10px 0;  overflow: hidden;  border-top: 1px #f1f0f0 solid; background: #fff;}
			.map #allmap{width: 100%; height: 200px}
		</style>
	</head>
	<body>
		<!-- header class="mui-bar mui-bar-nav"></header -->
		<div class="mui-content topws">
			<div class="app_machine">
				<dl>
					<dt><?php echo ($info['title']); ?></dt>
					<dd>
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-flow_chart"></use></svg> 频道 <?php echo ($info['tname']); ?>
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-list"></use></svg> 类型 <?php echo ($info['cname']); ?>
						<svg class="icon" aria-hidden="true"><use xlink:href="#icon-clock"></use></svg> <?php echo (date($info['updatetime'],"Y年m月d日")); ?>
					</dd>
				</dl>
				<img class="machine_img corners" src="/Public/Home/Template/images/p-3.jpg">
			</div>
			<div class="app_introduce">
				<dl>
				<?php if(($info['type'] == 0) or ($info['type'] == 1)): ?><dt>参考工资</dt>
				<?php else: ?>
					<dt>参考价格</dt><?php endif; ?>
					<dd>&yen; <b><?php echo ($info["price"]); ?></b></dd>
				</dl>
				<div class="describe">
					<?php echo ($info["content"]); ?>
				</div>
				
				<div class="describeimg">
					<ul>
						<li><img src="/Public/Home/Template/images/p-1.jpg"></li>
						<li><img src="/Public/Home/Template/images/p-2.jpg"></li>
						<li><img src="/Public/Home/Template/images/p-3.jpg"></li>
						<li><img src="/Public/Home/Template/images/p-4.jpg"></li>
					</ul>
				</div>
				<div class="data">
					<dl><dt><svg class="icon" aria-hidden="true"><use xlink:href="#icon-businessman"></use></svg> 名字</dt><dd><?php echo ($info["name"]); ?></dd></dl>
					<dl><dt><svg class="icon" aria-hidden="true"><use xlink:href="#icon-end_call"></use></svg> 电话</dt><dd><?php echo ($info["tel"]); ?></dd></dl>
					<dl><dt><svg class="icon" aria-hidden="true"><use xlink:href="#icon-cell_phone"></use></svg> 手机</dt><dd><?php echo ($info["mobile"]); ?></dd></dl>
					<dl><dt><svg class="icon" aria-hidden="true"><use xlink:href="#icon-globe"></use></svg> 地址</dt><dd><?php echo ($info["address"]); ?></dd></dl>
				</div>
				<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=LsCtmRBzqzIa2CnXEhm40ANbqrGlqCaQ"></script>
				<div class="map">
					<div id="allmap"></div>
					<script type="text/javascript">
						// 百度地图API功能
						var sContent =
								"<h4 style='margin:0 0 5px 0;padding:0.2em 0'>陈恩华</h4>" +
								"<img style='float:right;margin:4px' id='imgDemo' src='/Public/Home/Template/images/p-3.jpg' width='60' height='60''/>" +
								"<p style='margin:0;line-height:1.5;font-size:13px;'>手机：15355688333<br>地址：浙江 台州 路桥区</p>" +
								"</div>";
						var map = new BMap.Map("allmap");
						var point = new BMap.Point(121.394527,28.578766);
						var marker = new BMap.Marker(point);
						var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
						map.openInfoWindow(infoWindow,point); //开启信息窗口
						map.centerAndZoom(point, 15);
						map.addOverlay(marker);
						marker.addEventListener("click", function(){
							this.openInfoWindow(infoWindow);
							//图片加载完毕重绘infowindow
							document.getElementById('imgDemo').onload = function (){
								infoWindow.redraw();   //防止在网速较慢，图片未加载时，生成的信息框高度比图片的总高度小，导致图片部分被隐藏
							}
						});
					</script>
				</div>
			</div>

		</div>
<div class="mui-bar mui-bar-tab">
	<a class="mui-tab-item" href="<?php echo U('index/index');?>"><span class="mui-icon mui-icon-home"></span><span class="mui-tab-label">首页</span></a>
	<a class="mui-tab-item" href="<?php echo U('information/personnel');?>"><span class="mui-icon mui-icon-person"></span><span class="mui-tab-label">人才</span></a>
	<a class="mui-tab-item" href="<?php echo U('information/supply');?>"><span class="mui-icon mui-icon-compose"></span><span class="mui-tab-label">供求</span></a>
	<a class="mui-tab-item" href="<?php echo U('information/rentto');?>"><span class="mui-icon mui-icon-reload"></span><span class="mui-tab-label">租转</span></a>
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