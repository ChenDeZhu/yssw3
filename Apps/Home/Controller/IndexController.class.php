<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController{
	public function index(){
		// $this->isLogin();
		$M = M('information');
		// $list = $M->
		$this->display();
	}

}