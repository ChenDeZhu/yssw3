<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>客服中心</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="/Public/Home/Template/css/mui.min.css">
		<link rel="stylesheet" href="/Public/Home/Template/app.css">
		<script src="/Public/Home/Template/fonts/iconfont.js"></script>
		<style>
			.mui-table-view span.mui-pull-right {
				color: #999;
			}
			.head-img {
				width: 40px;
				height: 40px;
			}
			#head-img1 {
				position: absolute;
				bottom: 10px;
				right: 40px;
				width: 40px;
				height: 40px;
			}
			.head {
				height: 40px;
			}
			#head {
				line-height: 40px;
			}

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
		</style>
	</head>
	<body>
		<div class="mui-content topws">
			<ul class="mui-table-view mui-table-view-chevron topes">
				<li class="mui-table-view-cell mui-media">
					<span class="shijian">普通会员</span>
					<img class="mui-media-object mui-pull-left corners" <?php if($user['img'] == null): ?>src="/Public/Home/Template/images/headportrait.jpg" <?php else: ?> src="<?php echo ($user['img']); ?>"<?php endif; ?>>
					<div class="mui-media-body">
						<?php echo ($user["name"]); ?>
						<p class="mui-ellipsis-2"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-close_up_mode"></use></svg> 积分 <?php echo ($user["score"]); ?>
							<svg class="icon" aria-hidden="true"><use xlink:href="#icon-debt"></use></svg> 余额 &yen; <?php echo ($user["money"]); ?></p>
						
					</div>
				</li>
			</ul>

			<ul class="mui-table-view topes">
				<li class="mui-table-view-cell">
					<a id="head" class="mui-navigate-right">头像
						<span class="mui-pull-right head">
									<img class="head-img mui-action-preview" id="head-img1" src="/Public/Home/Template/images/logo.png"/>
								</span>
					</a>
				</li>
				<li class="mui-table-view-cell">
					<a>姓名<span class="mui-pull-right">陈恩华</span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>微信<span class="mui-pull-right">jtys114</span></a>
				</li>
			</ul>
			<ul class="mui-table-view topes">
				<li class="mui-table-view-cell">
					<a>QQ号<span class="mui-pull-right">106079595</span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>手机号<span class="mui-pull-right">15355688333</span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>邮箱地址<span class="mui-pull-right">a106079595@qq.com</span></a>
				</li>
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
       
	</script>
	<div style="display: none">统计代码</div>
	</body>
</html>