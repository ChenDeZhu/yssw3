<?php
namespace Home\Controller;
use Think\Controller;

class NewsController extends BaseController
{
	public function index(){
		$conditon = "";
		$cid = trim(I('get.cid'));
		if(!empty($cid)){
			$conditon = "cid=$cid";
		}
		$count = D('news')->where($conditon)->count();
		$page  = new \Think\Page($count,6);
		$nlist = D('news')->where($conditon)->limit($page->firstRow ,$page->listRows)->order('id desc')->select();
		$clist = $this->getCateList('cate','id');
		$tlist = D('news')->order('id desc')->limit(6,6)->select();
		$this->assign('tlist',$tlist);
		$this->assign('nlist',$nlist);
		$this->assign('clist',$clist);
		$this->assign('page',$page->show());
		$this->display('news');
	}
	public function nshow(){
		$id    = trim(I('get.id'));
		$ninfo = D('news')->where('id='.$id)->find();
		//更新点击量
		D('news')->where('id='.$id)->setInc('hits',1);
		$this->assign('ninfo',$ninfo);
		$this->display();
	}
}