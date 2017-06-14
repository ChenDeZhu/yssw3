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
	 
<script type="text/javascript" charset="utf-8" src="/Public/Admin/Lib/ueditor1_4_3_3/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/Lib/ueditor1_4_3_3/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/Lib/ueditor1_4_3_3/ueditor.parse.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/Public/Admin/Lib/ueditor1_4_3_3/lang/zh-cn/zh-cn.js"></script>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 网站设置<span class="c-gray en">&gt;</span> 联系我们 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" id="btn-refresh"><i class="Hui-iconfont" id="btn-refresh">&#xe68f;</i></a></nav>
<article class="page-container">
  <form action="<?php echo U('Website/cpupt');?>" method="post" class="form form-horizontal" id="form-member-add" onsubmit="return check()">
    <!-- <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系我们：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <script id="editor" type="text/plain" style="width:800px;height:400px;"><?php echo F('contacts');?></script>
      </div>
    </div> -->
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系我们：</label>
      <div class="formControls col-xs-5 col-sm-6">
      <textarea id="content"><?php echo F('contacts');?></textarea>
      </div>
    </div>
      <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3" style="margin-top:20px; margin-bottom: 20px;">
        <input class="btn btn-primary radius" type="submit" value="确认修改">
      </div>
    </div>
  </form>
</article>
<script type="text/javascript">
function check(){
    if(UE.getEditor('editor').getContent() == ''){
        alert('内容不能为空！');
        UE.getEditor('editor').isFocus();
        return false;
    }
    return true;
}
</script>
<script type="text/javascript" src="/Public/Admin/Lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/Lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/Admin/Js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/Admin/Js/H-ui.admin.js"></script> 
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content',{initialFrameWidth:800,initialFrameHeight:400,});
    </script>


 
  
</body>
</html>