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
	 
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员设置 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" id="btn-refresh"><i class="Hui-iconfont" id="btn-refresh">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="text-c">
	  <form action="<?php echo U('Manager/index');?>" method="post">
		<input type="text" class="input-text" style="width:250px" placeholder="输入关键字" id="key" name="key">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜管理员</button>
	  </form>
	</div>

	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="<?php echo U('Manager/add');?>"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>

	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr class="text-c">
				<th width="20">id</th>
				<th width="80">用户名</th>
				<th width="80">备注</th>
				<th width="80">注册日期</th>
				<th width="50">状态</th>
				<th width="80">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td class="mid"><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["username"]); ?></td>
					<td><?php echo ($vo["memo"]); ?></td>
					<td><?php echo (substr($vo['joindate'],0,10)); ?></td>
					<td class="td-status">
						<?php if($vo["flag"] == 1): ?><span class="label label-success radius">已启用</span>
						<?php else: ?>
							<span class="label label-false radius">已停用</span><?php endif; ?>
					</td>
					<td class="td-manage">
						<?php if($vo["username"] != 'admin'): if($vo["flag"] == 1): ?><a style="text-decoration:none" onClick="member_stop(this,'<?php echo ($vo["id"]); ?>')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> 
							<?php else: ?>
								<a style="text-decoration:none" onClick="member_start(this,'<?php echo ($vo["id"]); ?>')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a><?php endif; endif; ?>

						<a title="修改密码" href="<?php echo U('Manager/modpass',array('id'=>$vo['id']));?>"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
 

						
						<?php if($vo["username"] != 'admin'): ?><a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo ($vo["id"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a><?php endif; ?>

					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<tr>
					<td colspan="11">
						<?php echo ($page); ?>
					</td>
				</tr>
		</tbody>
	</table>
	</div>
</div>
<script type="text/javascript" src="/Public/Admin/Lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/Lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/Lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/Public/Admin/Lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/Admin/Lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/Js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/Admin/Js/H-ui.admin.js"></script>
<script type="text/javascript" src="/Public/Admin/Js/common.js"></script>
<script type="text/javascript">
/*****************************管理员管理**************************************/
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		var id = $(obj).closest('.text-c').find('.mid').text();
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		$.get("<?php echo U('Manager/Mzhuangtai');?>",{Mid: id,zt: "T"});
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		var id = $(obj).closest('.text-c').find('.mid').text();
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		$.get("<?php echo U('Manager/Mzhuangtai');?>",{Mid: id,zt: "K"});
		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		$.get("<?php echo U('Manager/Mzhuangtai');?>",{Mid: id,zt: "S"});
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
</script> 


 
  
</body>
</html>