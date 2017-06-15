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
	 
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span><?php echo ($name); ?>栏目 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" id="btn-refresh"><i class="Hui-iconfont" id="btn-refresh">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="<?php echo U('Cate/add',array('type'=>$type));?>"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加栏目</a></span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>

	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr class="text-c">
				<th width="20">排序</th>
				<th width="20">栏目图</th>
				<th width="20">栏目等级</th>
				<th width="60">名称</th>
				<th width="60">更新时间</th>
				<th width="60">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td><?php echo ($vo["sort"]); ?></td>
					<td width="60"><img src="<?php echo ($vo["img"]); ?>" width="60px"></td>
					<td><?php echo ($vo["Count"]); ?></td>
					<td><option value="<?php echo ($vo['cid']); ?>">
                        |
                        <?php $__FOR_START_7931__=0;$__FOR_END_7931__=$vo['Count'];for($i=$__FOR_START_7931__;$i < $__FOR_END_7931__;$i+=1){ ?>--<?php } echo ($vo["name"]); ?></td>
					<td><?php echo (date("Y-m-d",$vo["addtime"])); ?></td>
					<td class="td-manage">
						<a title="修改分类" href="<?php echo U('Cate/upd',array('id'=>$vo['cid']));?>"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
						<a title="删除分类" href="javascript:;" onclick="cate_del(this,'<?php echo ($vo["cid"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>	
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
	/*删除*/
	function cate_del(obj,id){
		layer.confirm('确认要删除栏目及栏目下所有内容吗？',function(index){
			$(obj).parents("tr").remove();
			$.get("<?php echo U('Cate/del');?>",{Mid: id});
			layer.msg('已删除!',{icon:1,time:1000});
		});
	}
</script>


 
  
</body>
</html>