<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>发布信息</title>
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
			<form class="mui-input-group topes">
			<input type="hidden" id="type" value="<?php echo ($type); ?>">
				<div class="mui-input-row">
					<label>信息类型</label>
					<input type="text" value="<?php echo ($name); ?>" readonly="readonly">
				</div>
				<div class="mui-input-row">
					<label><?php echo ($name); ?>栏目</label>
					<select name="cid">
					<option value="">请选择栏目</option>
						<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cid"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				<div class="mui-input-row">
					<label><?php echo ($name); ?>标题</label>
					<input type="text" placeholder="请输入标题" id="title">
				</div>
				<div class="mui-input-row">
					<label>联系人</label>
					<input type="text" placeholder="请输入联系人" id="name">
				</div>
				<div class="mui-input-row">
					<label>联系电话</label>
					<input type="text" placeholder="请输入联系电话" id="mobile">
				</div>
				<div class="mui-input-row">
				<?php if(($type == 0) or ($type == 1)): ?><label>参考薪酬</label>
					<?php else: ?>
					<label>参考价格</label><?php endif; ?>
					<input type="text" placeholder="请输入金额" id="price">
				</div>
				<div class="mui-input-row">
					<label>地址</label>
					<input type="text" placeholder="请输入联系地址" id="address">
				</div>
				
			</form>
			<div class="mui-input-row" style="margin: 10px 5px;">
					<textarea id="textarea" rows="5" placeholder="请输入信息详情" id="content"></textarea>
				</div>
				<div class="mui-button-row">
					<button type="button" class="mui-btn mui-btn-primary" id="updatec">发布信息</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="button" class="mui-btn mui-btn-danger" onclick="window.history.back();">取消发布</button>
				</div>
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
        var before = 1;
        mui('#updatec')[0].addEventListener('tap',function(){
        	if(before == 0){
        		return false;
        	}
        	before = 0;
        	var postdate = {};
        	postdate['uid'] = <?php echo ($user["uid"]); ?>;
        	postdate['type'] = mui('#type')[0].value;
        	postdate['title'] = mui('#title')[0].value;
        	postdate['mobile'] = mui('#mobile')[0].value;
        	postdate['price'] = mui('#price')[0].value;
        	postdate['address'] = mui('#address')[0].value;
        	postdate['content'] = mui('#content').value;
        	mui.post("<?php echo U('addvip');?>",postdate,function(res){
					if(res==1){
						before = 1;
						mui.toast('发布成功');
						setTimeout("window.location.href='/index.php/User/myPush'",500);
					}else{
						mui.toast('系统繁忙，请稍后再试');
					}
				},'json'
			);
        });
        
	</script>
	<div style="display: none">统计代码</div>
	</body>
</html>