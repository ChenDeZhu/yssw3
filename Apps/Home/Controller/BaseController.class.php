<?php
namespace Home\Controller;
use Think\Controller;

vendor('Pay.lib.JSSDK');
class BaseController extends Controller{
    public function _initialize(){
    	//获取微信相关信息
    	$jssdk=new JSSDK("wx53630ec8fbb17ecb","3bbfec4499541a3499f30cf97bbd5b67");
        $signPackage=$jssdk->getSignPackage();
        $this->assign('signPackage',$signPackage);
        $_SESSION['from']=get_url();
        
    }
    public function isLogin(){
        if($_SESSION['uid']==''){
           redirect(U('Login/login'), 0, '页面跳转中...');
        }
    }
}