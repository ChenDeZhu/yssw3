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

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 网站设置<span class="c-gray en">&gt;</span> 公司信息 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" id="btn-refresh"><i class="Hui-iconfont" id="btn-refresh">&#xe68f;</i></a></nav>
<article class="page-container">
  <!-- <form action="<?php echo U('Website/pupt');?>" method="post" class="form form-horizontal" id="form-member-add" onsubmit="return check()"> -->
  <form action="<?php echo U('Website/pupt');?>" method="post" class="form form-horizontal" id="form-member-add">
  <input type="hidden" name="id" value="1">
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司名称：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <input type="text" class="input-text radius" value="<?php echo ($pro["name"]); ?>" name="name" id="name">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系人：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <input type="text" class="input-text radius" value="<?php echo ($pro["person"]); ?>" name="person" id="person">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系电话：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <input type="text" class="input-text radius" value="<?php echo ($pro["mobile"]); ?>" name="mobile" id="mobile" onkeyup="this.value=this.value.replace(/[^\d]/ig,'')">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <input type="text" class="input-text radius" value="<?php echo ($pro["email"]); ?>" name="email" id="email">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>QQ：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <input type="text" class="input-text radius" value="<?php echo ($pro["qq"]); ?>" name="qq" id="qq" onkeyup="this.value=this.value.replace(/[^\d]/ig,'')">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>推广所得积分：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <input type="text" class="input-text radius" value="<?php echo ($pro["score"]); ?>" name="score" id="score" onkeyup="this.value=this.value.replace(/[^\d]/ig,'')">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>推广所得金额：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <input type="text" class="input-text radius" value="<?php echo ($pro["money"]); ?>" name="money" id="money" onkeyup="this.value=this.value.replace(/[^\d]/ig,'')">
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
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公告显示：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <textarea class="textarea-text radius" name="notice" id="notice" rows="4" style="width: 40%; border-color: #ddd; font-size: 14px"><?php echo ($pro["notice"]); ?></textarea> 
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司地址：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <textarea class="textarea-text radius" name="address" id="address" rows="4" style="width: 40%; border-color: #ddd; font-size: 14px"><?php echo ($pro["address"]); ?></textarea> 
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司描述（100字以内）：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <textarea class="textarea-text radius" name="describe" id="describe" rows="4" style="width: 40%; border-color: #ddd;font-size: 14px"><?php echo ($pro["describe"]); ?></textarea> 
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>SEO关键字：</label>
      <div class="formControls col-xs-5 col-sm-6">
        <textarea class="textarea-text radius" name="keywords" id="keywords" rows="4" style="width: 40%; border-color: #ddd;font-size: 14px"><?php echo ($pro["keywords"]); ?></textarea> 
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司介绍：</label>
      <div class="formControls col-xs-5 col-sm-6">
      <textarea name="content" id='content'><?php echo ($pro["content"]); ?></textarea>
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
    if($('#name').val() == ''){
       layer.msg('请填写公司名称！');
       $('#name').focus();
       return false; 
    }
    if($('#person').val() == ''){
       layer.msg('请填写联系人！');
       $('#person').focus();
       return false; 
    }
    if($('#mobile').val() == ''){
       layer.msg('请填写联系电话！');
       $('#mobile').focus();
       return false; 
    }
    if($('#email').val() == ''){
       layer.msg('请填写email！');
       $('#email').focus();
       return false; 
    }
    if($('#qq').val() == ''){
       layer.msg('请填写qq！');
       $('#qq').focus();
       return false; 
    }
    if($('#address').val() == ''){
       layer.msg('请填写公司地址！');
       $('#address').focus();
       return false; 
    }
    if($('#keywords').val() == ''){
       layer.msg('请填写SEO关键字！');
       $('#keywords').focus();
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