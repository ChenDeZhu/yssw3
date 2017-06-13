<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController{


	public function isLogin(){
		if(!isset($_SESSION['uid'])){
			echo "login";
			sleep(1);
			$this->success('注册成功', $_SESSION['from']);
		}
	}






	





}