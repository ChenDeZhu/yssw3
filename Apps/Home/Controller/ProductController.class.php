<?php
namespace Home\Controller;
use Think\Controller;

class ProductController extends BaseController
{
	public function index(){
		$conditon = "";
		$pid = trim(I('get.pid'));
		if(!empty($pid)){
			$conditon = "pid=$pid";
		}
		$count = D('product')->where($conditon)->count();
		$page  = new \Think\Page($count,12);
		$plist = D('product')->where($conditon)->limit($page->firstRow ,$page->listRows)->order('id desc')->select();
		$clist = $this->getCateList('pcate','id');
		$this->assign('plist',$plist);
		$this->assign('clist',$clist);
		$this->assign('page',$page->show());
		$this->display('product');
	}
	public function pshow(){
		$id    = trim(I('get.id'));		
		$pinfo = D('product')->where('id='.$id)->find();
		//更新点击量	
		D('product')->where('id='.$id)->setInc('hits');
		$tlist = D('product')->where('id<>'.$id)->order('hits desc')->limit(4)->select();	
		$this->assign('tlist',$tlist);
		$this->assign('pinfo',$pinfo);
		$this->display();
	}
}