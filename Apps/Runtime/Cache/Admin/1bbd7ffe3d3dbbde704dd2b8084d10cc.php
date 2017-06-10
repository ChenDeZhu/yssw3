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

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理<span class="c-gray en">&gt;</span> 添加产品 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" id="btn-refresh"><i class="Hui-iconfont" id="btn-refresh">&#xe68f;</i></a></nav>

<article class="page-container">
	<form action="<?php echo U('Product/insert');?>" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data"  onsubmit="return check()">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>选择分类：</label>
            <div class="formControls col-xs-5 col-sm-6">
                <span class="select-box">
                  <select class="select" size="1" name="pid" id="pid">
                    <option value="">--请选择所属分类--</option>
                    <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                </span>
            </div>
        </div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>产品名称：</label>
			<div class="formControls col-xs-5 col-sm-6">
				<input type="text" class="input-text radius" value="" placeholder="" name="title" id="title">
			</div>
		</div>
        <div class="row cl">
          <label class="form-label col-xs-4 col-sm-3">产品介绍：</label>
          <div class="formControls col-xs-5 col-sm-6">
            <script id="editor" type="text/plain" style="width:800px;height:400px;"></script>
          </div>
        </div>
		<label class="form-label col-xs-4 col-sm-3" style="height:100px; line-height: 140px"><span class="c-red">*</span>产品logo：大小321*211</label>
		<div class="main-upload">
          <div class="main-img">
            <input class="input" type="file" name="plogo" id="doc2" style="opacity:0; display:none;" onchange="javascript:setImagePreview();">
            <label id="a2" for="doc2"><i class="Hui-iconfont">&#xe600;</i></label>
            <img id="preview2"> </div>
        </div>
		</div>
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" name="submit" value="保存后关闭">&nbsp;&nbsp;&nbsp;
        <input class="btn btn-primary radius" type="submit" name="tsubmit" value="继续发表">&nbsp;&nbsp;&nbsp;
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
  if($('#pid').val() == ''){
    alert('请选择所属分类！');
    return false;
  }
  if($('#title').val() == ''){
    alert('标题不能为空！');
    $('#title').focus();
    return false;
  }
  if(UE.getEditor('editor').getContent() == ''){
    alert('内容不能为空！');
    UE.getEditor('editor').isFocus();
    return false;
  }
  if(document.getElementById("preview2").style.display !== 'block'){
        alert("图片不能为空!");
        return false;
  }
  if($('#url').val() == ''){
    alert('链接地址不能为空！');
    
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
    var ue = UE.getEditor('editor');
    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>


 
  
</body>
</html>