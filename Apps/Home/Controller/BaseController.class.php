<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function _initialize(){
        $_SESSION['from']=get_url();
        
    }
    public function isLogin(){
        if($_SESSION['uid']==''){
           redirect(U('Login/login'), 0, '页面跳转中...');
        }
    }
}