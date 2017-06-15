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
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/Public/Admin/Lib/ueditor1_4_3_3/lang/zh-cn/zh-cn.js"></script>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 修改<?php echo ($name); ?> <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" id="btn-refresh"><i class="Hui-iconfont" id="btn-refresh">&#xe68f;</i></a></nav>

<article class="page-container">
	<form action="<?php echo U('Information/update');?>" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data"  onsubmit="return check()">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属用户：</label>
            <div class="formControls col-xs-5 col-sm-6">
                <span class="select-box">
                  <select class="select" size="1" name="uid" id="uid">
                    <option value="">--请选择用户--</option>
                    
                        <?php if(is_array($ulist)): $i = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["uid"]); ?>" <?php if($vo['uid'] == $info['uid']): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属栏目：</label>
            <div class="formControls col-xs-5 col-sm-6">
                <span class="select-box">
                  <select class="select" size="1" name="cid" id="cid">
                    <option value="">--请选择栏目--</option>
                    <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v['cid']); ?>" <?php if($v['cid'] == $info['cid']): ?>selected<?php endif; ?>><?php echo ($v['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                </span>
            </div>
        </div>
        <input type="hidden" name="type" value="<?php echo ($type); ?>">
        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span><?php echo ($name); ?>标题：</label>
			<div class="formControls col-xs-5 col-sm-6">
				<input type="text" class="input-text radius" value="<?php echo ($info["title"]); ?>" placeholder="" name="title" id="title">
			</div>
		</div>
        <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3" style="height:100px; line-height: 140px"><span class="c-red">*</span>图片：</label>
		<div class="main-upload">
            <div class="main-img">
                <input class="input" type="file" name="img" id="doc2" style="opacity:0; display:none;" onchange="javascript:setImagePreview();">
                <label id="a2" for="doc2"><i class="Hui-iconfont">&#xe600;</i></label>
                <img id="preview2" src="<?php echo ($info["img"]); ?>"  style="display: block; width: 100%">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>详情图(4张)：</label>
            <div class="formControls col-xs-5 col-sm-6">
                <button type="button" id="j_upload_img_btn" class="btn btn-primary radius">上传详情图</button> 
                <ul id="upload_img_wrap">
                    <?php if(is_array($img_info)): $i = 0; $__LIST__ = $img_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($vo["savepath"]); ?>" height="150"></li>
                    <input type="hidden" name="lunbo[]" value="<?php echo ($vo["savepath"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <textarea id="uploadEditor" style="display: none;"></textarea>
            </div>
        </div>
         <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系人：</label>
            <div class="formControls col-xs-5 col-sm-6">
                <input type="text" class="input-text radius" value="<?php echo ($info["name"]); ?>" placeholder="" name="name" id="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span><?php if(($type == 1 )or ($type == 0)): ?>参考工资：<?php else: ?>参考价格：<?php endif; ?></label>
            <div class="formControls col-xs-5 col-sm-6">
                <input type="text" class="input-text radius" value="<?php echo ($info["price"]); ?>" placeholder="" name="price" id="price">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系电话：</label>
            <div class="formControls col-xs-5 col-sm-6">
                <input type="text" class="input-text radius" value="<?php echo ($info["mobile"]); ?>" placeholder="" name="mobile" id="mobile">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>地址：</label>
            <div class="formControls col-xs-5 col-sm-6">
                <input type="text" class="input-text radius" value="<?php echo ($info["address"]); ?>" placeholder="" name="address" id="address">
            </div>
        </div>
        </div>
        <div class="row cl">
          <label class="form-label col-xs-4 col-sm-3">详细内容：</label>
          <div class="formControls col-xs-5 col-sm-6">
            <textarea name="content" id='content'><?php echo ($info["content"]); ?></textarea>
          </div>
        </div>
		</div>
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" name="submit" value="保存">&nbsp;&nbsp;&nbsp;
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
function check(){
  
  if($('#title').val() == ''){
    layer.msg('标题不能为空！');
    $('#title').focus();
    return false;
  }
  if(UE.getEditor('editor').getContent() == ''){
    layer.msg('内容不能为空！');
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
<script type="text/javascript">

    // 实例化编辑器，这里注意配置项隐藏编辑器并禁用默认的基础功能。
 var uploadEditor = UE.getEditor("uploadEditor", {
        isShow: false,
        focus: false,
        enableAutoSave: false,
        autoSyncData: false,
        autoFloatEnabled:false,
        wordCount: false,
        sourceEditor: null,
        scaleEnabled:true,
        toolbars: [["insertimage"]]
    });

    // 监听多图上传和上传附件组件的插入动作
 uploadEditor.ready(function () {
        uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
        
    });

    // 自定义按钮绑定触发多图上传和上传附件对话框事件
 document.getElementById('j_upload_img_btn').onclick = function () {
        var dialog = uploadEditor.getDialog("insertimage");
        dialog.title = '多图上传';
        dialog.render();
        dialog.open();
    };



    // 多图上传动作
 function _beforeInsertImage(t, result) {
        var imageHtml = '';
        for(var i in result){
            imageHtml += '<li><img src="'+result[i].src+'" height="150"></li>';
            imageHtml +='<input type="hidden" name="lunbo[]" value="'+result[i].src+'">';
        }
        document.getElementById('upload_img_wrap').innerHTML = imageHtml;
    }


</script>


 
  
</body>
</html>