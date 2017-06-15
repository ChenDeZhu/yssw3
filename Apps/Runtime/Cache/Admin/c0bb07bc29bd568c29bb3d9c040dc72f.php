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
	 


<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 添加<?php echo ($name); ?>栏目 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" id="btn-refresh"><i class="Hui-iconfont" id="btn-refresh">&#xe68f;</i></a></nav>

<article class="page-container">
	<form action="<?php echo U('Cate/insert');?>" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data"  onsubmit="return check()">
		<input type='hidden' name='type' value="<?php echo ($type); ?>">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上级栏目：</label>
			<div class="formControls col-xs-5 col-sm-6">
                <span class="select-box">
                  <select class="select" size="1" name="pid" >
                    <option value="0">顶级栏目</option>
                    	<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cid']); ?>">
                        |
                        <?php $__FOR_START_3406__=0;$__FOR_END_3406__=$vo['Count'];for($i=$__FOR_START_3406__;$i < $__FOR_END_3406__;$i+=1){ ?>--<?php } ?>
 						<?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                </span>
            </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类名称：</label>
			<div class="formControls col-xs-5 col-sm-6">
				<input type="text" class="input-text radius" value="" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>栏目图片：</label>
			<div class="main-upload">
	          <div class="main-img">
	            <input class="input" type="file" name="img" id="doc2" style="opacity:0; display:none;" onchange="javascript:setImagePreview();">
	            <label id="a2" for="doc2"><i class="Hui-iconfont">&#xe600;</i></label>
	            <img id="preview2"> </div>
	        </div>
		</div>
    <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序：</label>
			<div class="formControls col-xs-5 col-sm-6">
				<input type="text" class="input-text radius" value="0" placeholder=""  name="sort" style="width: 40px" onkeyup="value=value.replace(/[^\d.]/g,'')" maxlength="4">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">&nbsp;&nbsp;&nbsp;
				<input class="btn btn-primary radius" onclick="history.go(-1)" value="返回" type="button">
			</div>
		</div>
	</form>
</article>
<style type="text/css">
.main-upload {
    margin: 20px;
    position: relative;
    width: 150px;
    margin-left: 26%;
    background: #FFF;
    border: 1px solid #ddd;
    margin-bottom: 40px
}
.main-img {
    width: 150px;
    height: 100px;
    margin: 0 auto;
}
#a2{
    display: block;
    width: 150px;
    height: 20px;
    position: absolute;
    bottom: -20px;
    background: #5a98de;
    text-align: center;
    color: #000;
    line-height: 20px;
    z-index: 999;
}
#a2 i{
    color: #fff;
}
#a2:hover{
  background: #0a6999;
}
</style>
<script>
function setImagePreview() {
  var docObj2=document.getElementById("doc2");
  var imgObjPreview2=document.getElementById("preview2");
  if(docObj2.files &&    docObj2.files[0]){
  //火狐下，直接设img属性
  imgObjPreview2.style.display = 'block';
  imgObjPreview2.style.width="100%";
  imgObjPreview2.style.height="100%"; 
  imgObjPreview2.src = window.URL.createObjectURL(docObj2.files[0]);
  }
  return true;
}
</script>
<script type="text/javascript">
function check(){
	if($('#name').val() == ''){
		layer.msg('分类名不能为空！');
		$('#name').focus();
		return false;
	}
  
	return true;
}
</script>
<script type="text/javascript" src="/Public/Admin/Lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/Lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/Admin/Js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/Admin/Js/H-ui.admin.js"></script> 


 
  
</body>
</html>