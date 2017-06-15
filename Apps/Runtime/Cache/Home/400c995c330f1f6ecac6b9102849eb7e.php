<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>银刷商务</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="/Public/Home/Template/css/mui.min.css">
		<link rel="stylesheet" href="/Public/Home/Template/app.css">
		<script src="/Public/Home/Template/fonts/iconfont.js"></script>
		<style>
			/* 轮播广告 */
			.carouselad{  height: 200px;  }
			.carouselad .logo{ position:absolute;width:40px;height:40px; z-indent:2;left:10px;top:10px; }
			.notice{
				margin: 0;
				padding: 0;
				overflow: hidden;
				border-bottom: #E4E4E6 1px solid;
				background-color: #fff;
			}
			/* 公告 */
			.notice{
				margin: 0;
				padding: 0;
				overflow: hidden;
				border-bottom: #E4E4E6 1px solid;
				background-color: #fff;
			}
			.notice dl{
				margin: 0;
				padding: 0;
				overflow: hidden;
			}
			.notice dl dt{
				margin: 0;
				padding: 0;
				overflow: hidden;
				float: left;
				width: 30%;
				text-align: center;
			}
			.notice dl dt img{
				margin: 0;
				padding: 0;
				overflow: hidden;
				width: auto;
				height: 30px;
			}
			.notice dl dd{
				margin: 0;
				padding:0;
				overflow: hidden;
				float: left;
				line-height: 30px;
				font-size: 14px;
				height: 30px;
				width: 70%;
				background: #fff;
			}
			/* 栏目 */
			.column{
				margin: 0;
				padding: 0;
				overflow: hidden;
				border-bottom:rgba(228, 228, 230, 0.51) 1px solid;
				border-top: #E4E4E6 1px solid;
				background-color: #fff;
			}
			.column a{  color: #000;  }
			.column dl{
				margin: 10px 0 10px 2%;
				padding: 0;
				overflow: hidden;
				float: left;
				width: 22.5%;
				text-align: center;
			}
			.column dl dt{
				margin: 0 0 10px 0;
				padding: 0;
				overflow: hidden;
			}
			.column dl dt svg{
				margin: 0;
				padding: 0;
				overflow: hidden;
				font-size: 40px;
			}
			.column dl dd{
				margin: 0;
				padding:0;
				overflow: hidden;
				font-size: 14px;
				font-weight: 300;
			}
			/* 活动 */
			.activity{
				margin: 0;
				padding: 0;
				overflow: hidden;
				border-bottom: #E4E4E6 1px solid;
				background-color: #fff;
			}
			.activity a{  color: #000;  }
			.activity dl{
				margin: 10px 0;
				padding: 0;
				overflow: hidden;
				float: left;
				width: 25%;
			}
			.activity dl dt{
				margin: 0;
				padding: 0;
				overflow: hidden;
				float: left;
				width: 30%;
				text-align: center;
			}
			.activity dl dt svg{
				margin: 0;
				padding: 0;
				overflow: hidden;
			}
			.activity dl dd{
				margin: 0;
				padding:0;
				overflow: hidden;
				float: left;
				width: 70%;
				font-size: 14px;
				font-weight: 300;
			}
			.activity ul{
				margin: 0;
				padding: 10px 0;
				overflow: hidden;
				clear: both;
			}
			.activity ul li{
				margin: 0;
				padding: 0;
				overflow: hidden;
				float: left;
				width: 25%;
				text-align: center;
			}
			.activity ul li img{
				margin: 0;
				padding: 0;
				overflow: hidden;
				width: 80%;
				height: auto;
			}


			/* 添加机器 */
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

		<!-- header class="mui-bar mui-bar-nav"></header -->
		<div class="mui-content topws mui-scroll-wrapper" id="pullrefresh"> 
			<div class="mui-scroll">
			<div class="mui-slider carouselad" >
				<div class="mui-slider-group mui-slider-loop">
					<div class="mui-slider-item mui-slider-item-duplicate"><a href="#"><img src="/Public/Home/Template/images/company.jpg"></a></div>
					<?php if(is_array($img_info)): $i = 0; $__LIST__ = $img_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-slider-item"><a href="#"><img src="<?php echo ($vo['savepath']); ?>"></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
					
					<div class="mui-slider-item mui-slider-item-duplicate"><a href="#"><img src="/Public/Home/Template/images/LB-1.jpg"></a>
					</div>
				</div>
				<div class="mui-slider-indicator">
					<div class="mui-indicator mui-active"></div>
					<div class="mui-indicator"></div>
					<div class="mui-indicator"></div>
					<div class="mui-indicator"></div>
				</div>
				<!-- <img class="logo" src="/Public/Home/Template/images/logo.png"></a> -->
			</div>
			<div class="notice">
				<dl>
					<dt><img src="/Public/Home/Template/images/NOTICE.png"></dt>
					<dd class="marquee"><div><?php echo ($info['notice']); ?></div></dd>
				</dl>
			</div>
			
			<ul class="mui-table-view mui-table-view-chevron productlb topbk">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
					<span class="shijian">&yen; <b><?php echo ($vo["price"]); ?></b></span>
					<a class="mui-navigate-right" href="<?php echo U('Information/detail',array('id'=>$vo['id']));?>">
					<?php if($vo['img'] != null): ?><img class="mui-media-object mui-pull-left" src="<?php echo ($vo["img"]); ?>">
					<?php else: ?>
						<img class="mui-media-object mui-pull-left" src="/Public/Home/Template/images/nopic.png"><?php endif; ?>
						<div class="mui-media-body">
							<?php echo ($vo["title"]); ?>
							<div class="parameter">
								<dl><dt>频道</dt><dd><?php echo ($vo['tname']); ?></dd></dl>
								<dl><dt>类别</dt><dd><?php echo ($vo['name']); ?></dd></dl>
								<dl><dt>日期</dt><dd><?php echo (date("Y-m-d",$vo["updatetime"])); ?></dd></dl>
							</div>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			
		</div>
		</div>
		<div class="mui-bar mui-bar-tab">
			<a class="mui-tab-item  mui-active" href="<?php echo U('index/index');?>"><span class="mui-icon mui-icon-home"></span><span class="mui-tab-label">首页</span></a>
			<a class="mui-tab-item" href="<?php echo U('information/personnel');?>"><span class="mui-icon mui-icon-person"></span><span class="mui-tab-label">人才</span></a>
			<a class="mui-tab-item" href="<?php echo U('information/supply');?>"><span class="mui-icon mui-icon-compose"></span><span class="mui-tab-label">供求</span></a>
			<a class="mui-tab-item" href="<?php echo U('information/rentto');?>"><span class="mui-icon mui-icon-reload"></span><span class="mui-tab-label">租转</span></a>
			<a class="mui-tab-item" href="<?php echo U('user/my');?>"><span class="mui-icon mui-icon-contact"></span><span class="mui-tab-label">我的</span></a>
		</div>
		<script src="/Public/Home/Template/js/mui.min.js"></script>
		<script>
            mui.init({
                //mui js 代码
                pullRefresh: {
					container: '#pullrefresh',
					
					up: {
						contentrefresh: '正在加载...',
						callback: pullupRefresh
					}
				}
            });
            var count = 0;
            function pullupRefresh() {
				setTimeout(function() {
					mui('#pullrefresh').pullRefresh().endPullupToRefresh((count > 2)); //参数为true代表没有更多数据了。
					var table = document.body.querySelector('.mui-table-view');
					var cells = document.body.querySelectorAll('.mui-table-view-cell');
					mui.post("<?php echo U('upRefresh');?>",{
							first:cells.length,
						},function(res){
							if(res['status'] ==1){
								for (var i = 0;i < res['data'].length; i++) {
								var li = document.createElement('li');
								li.className = 'mui-table-view-cell';
								id = res['data'][i]['id'];
								var img = res['data'][i]['img'];
								li.innerHTML = '<span class="shijian">&yen; <b>'+res['data'][i]['price']+'</b></span><a class="mui-navigate-right" href="/index.php/information/detail/id/'+id+'"><img class="mui-media-object mui-pull-left" src="'+res['data'][i]['img']+'"><div class="mui-media-body">'+res['data'][i]['title']+'<div class="parameter"><dl><dt>频道</dt><dd>'+res['data'][i]['tname']+'</dd></dl><dl><dt>类别</dt><dd>'+res['data'][i]['name']+'</dd></dl><dl><dt>日期</dt><dd>'+res['data'][i]['date']+'</dd></dl></div></div></a>';
								table.appendChild(li);
							}
							}else{
								count = 5;
								mui.toast('没有信息啦');
							}		
						},'json'
					);
					
					
				}, 1000);
			}
            //测试代码
            mui('body').on('tap','a',function(){window.top.location.href=this.href;});
            //微信代码
           
            
		</script>

		<div style="display: none">统计代码</div>
	</body>
</html>