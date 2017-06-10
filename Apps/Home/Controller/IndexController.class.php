<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends BaseController
{
	public function index(){
		$plist = $this->getList('product',8);
		$nlist = $this->getList('news','');
		$blist = $this->getList('banner','');
		$this->assign('plist',$plist);
		$this->assign('nlist',$nlist);
		$this->assign('blist',$blist);
		$this->display();
	}
}