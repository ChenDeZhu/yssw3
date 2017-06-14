<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>转租列表</title>
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
			<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Information/rentto',array('cid'=>$vo['cid']));?>" <?php if($cid == $vo['cid']): ?>class="no"<?php endif; ?>><li><?php echo ($vo["name"]); ?></li></a><?php endforeach; endif; else: echo "" ;endif; ?>

			</ul>
		</div>
	</header>
	<div class="mui-content topws">

		<ul class="mui-table-view mui-table-view-chevron productlb">
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
				<span class="shijian">&yen; <b><?php echo ($vo["price"]); ?></b></span>
				<a class="mui-navigate-right" href="<?php echo U('Information/detail',array('id'=>$vo['id']));?>">
					<img class="mui-media-object mui-pull-left" <?php if($vo['img'] != null): ?>src="<?php echo ($vo['img']); ?>"<?php else: ?> src="/Public/Home/Template/images/p-5.jpg"<?php endif; ?>>
					<div class="mui-media-body">
						<?php echo ($vo["title"]); ?>
						<div class="parameter">
							<dl><dt>频道</dt><dd><?php echo ($vo["tname"]); ?></dd></dl>
							<dl><dt>类别</dt><dd><?php echo ($vo["cname"]); ?></dd></dl>
							<dl><dt>日期</dt><dd><?php echo (date("Y年m月d日",$vo["update"])); ?></dd></dl>
						</div>
					</div>
				</a>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
			
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