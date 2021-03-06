<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>我的</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="stylesheet" href="/Public/Home/Template/css/mui.min.css">
	<link rel="stylesheet" href="/Public/Home/Template/app.css">
	<script src="/Public/Home/Template/fonts/iconfont.js"></script>
	<style>
		.my{
			padding: 30px 0 0 0;
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
		.my dl{
			padding: 10px 0 0 0;
			margin: 0;
			overflow: hidden;
			text-align: center;
			color: #fff;
			line-height: 25px;
		}
		.my dl dt{
			padding:0;
			margin: 0;
			overflow: hidden;
			font-weight: 900;
			font-size: 20px;
		}
		.my dl dd{
			padding:0;
			margin: 10px 0 0 0;
			overflow: hidden;
			font-size: 14px;
		}
		.my .headportrait{
			padding: 5px;
			margin: 0;
			overflow: hidden;
			width: 20%;
			background: #fff;
		}
		.my ul{
			padding: 0;
			border-top: rgba(0, 92, 214, 0.69) 1px solid ;
			margin: 30px 0 0 0;
			line-height: 40px;
			overflow: hidden;
			text-align: center;
			color: #fff;
		}
		.my ul a{ color: #fff;}
		.my ul li{
			padding:0;
			margin: 0;
			overflow: hidden;
			float: left;
			width: 25%;
			font-size: 14px;
			border-left: rgba(0, 92, 214, 0.69) 1px solid ;
		}
/* 收入表 */
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
	</style>
</head>
<body>
<!-- header class="mui-bar mui-bar-nav"></header -->
<div class="mui-content topws">
	<div class="my">
		<img class="headportrait round" <?php if($user['img'] == null): ?>src="/Public/Home/Template/images/headportrait.jpg" <?php else: ?> src="<?php echo ($user['img']); ?>"<?php endif; ?>>
		<dl>
			<dt><?php echo ($user["name"]); ?></dt>
			<dd><svg class="icon" aria-hidden="true"><use xlink:href="#icon-close_up_mode"></use></svg> 积分 <?php echo ($user["score"]); ?>
				<svg class="icon" aria-hidden="true"><use xlink:href="#icon-debt"></use></svg> 余额 &yen; <?php echo ($user["money"]); ?>
				<svg class="icon" aria-hidden="true"><use xlink:href="#icon-portrait_mode"></use></svg> 普通会员</dd>
		</dl>
		<ul>
			<a href="<?php echo U('account');?>"><li>我的账户</li></a>
			<a href="<?php echo U('update_members');?>"><li>会员信息</li></a>
			<a href="<?php echo U('addvip');?>"><li>升级帐号</li></a>
			<a href="<?php echo U('service');?>"><li>客服中心</li></a>
		</ul>
	</div>

	<ul class="mui-table-view topes">
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right" href="<?php echo U('add_information');?>">
				<svg class="icon" aria-hidden="true"><use xlink:href="#icon-edit_image"></use></svg> 发布
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right" href="<?php echo U('myPush');?>">
				<svg class="icon" aria-hidden="true"><use xlink:href="#icon-list"></use></svg> 我发布的信息
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right" href="<?php echo U('readme');?>">
				<svg class="icon" aria-hidden="true"><use xlink:href="#icon-binoculars"></use></svg> 阅览过我的信息
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right" href="<?php echo U('my_footprint');?>">
				<svg class="icon" aria-hidden="true"><use xlink:href="#icon-podium_with_audience"></use></svg> 我阅览过的信息
			</a>
		</li>
	</ul>

	<ul class="mui-table-view topes">
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right" href="<?php echo U('promote');?>">
				<svg class="icon" aria-hidden="true"><use xlink:href="#icon-genealogy"></use></svg> 我的推广
			</a>
		</li>
	</ul>
	<div class="theme"><dl><dt>我的推广记录</dt><dd><samp>MY Extension</samp></dd></dl></div>
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
<!-- 微信分享 -->
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script type="text/javascript">
	 wx.config({
        url:'<?php echo $signPackage["url"];?>',
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp:'<?php echo $signPackage["timestamp"];?>',
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
            
            'onMenuShareTimeline',
            'onMenuShareAppMessage'
        ]
    });
	//分享到个人
	 	wx.ready(function () {
	        var imgurl="http://www.jtys114.com__CSS__/timg2.jpg";
	        wx.onMenuShareTimeline({
	            title: '个人主页', // 分享标题
	            imgUrl: imgurl, // 分享图标
	            success: function () {
	                mui.toast("分享成功");
	            },
	            cancel: function () {
	                mui.toast("您取消了分享");
	            }
        });
    //分享到朋友圈
        wx.onMenuShareAppMessage({
            title: '个人主页',
            desc: '个人主页个人主页个人主页', // 分享标题
            imgUrl: imgurl, // 分享图标
            success: function () {
                mui.toast("分享成功");
            },
            cancel: function () {
                mui.toast("您取消了分享");
            }
        });
    });
	
	
    wx.error(function(res){
    });
</script>


</body>
</html>