<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link href="/Public/Admin/Css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/Css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/Lib/iconfonts/1.0.7/iconfont.css" />
<title>台州银刷商务服务有限公司管理平台</title>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<!-- <div class="header"></div> -->
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" onsubmit="javascript:return false">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="username" name="username" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;" name="Verify" id="Verify">
          <img src="<?php echo U('Index/VerifyShow');?>" onclick="this.src='<?php echo U('Index/VerifyShow');?>';" title="看不清图片可以单击换一换">  </div>
      </div>
 
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" onclick="login()" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright <?php echo F('profiles')['company'];?> All Rights Reserved.</div>
<script type="text/javascript" src="/Public/Admin/Lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/Js/H-ui.js"></script> 
<script type="text/javascript">
  function login(){
      var url = window.location.href;
      $.post(url, {username: $('#username').val(),password:$('#password').val(),Verify:$('#Verify').val()}, function(data) {
        if(data == 1){
          alert('验证码错误！');
        }
        if(data == 2){
          alert('用户名或者密码错误！')
        }
        if(data == 3){
          window.location.href=url.replace('login','index');
        }
      });
  }
</script>
</body>
</html>