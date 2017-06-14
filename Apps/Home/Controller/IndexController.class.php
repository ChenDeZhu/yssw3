<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController{
	public function index(){
		// $this->isLogin();
		$M = M('information');
		$list = $M->alias('a')->join('__CATE__ b on b.cid = a.cid')
		->field('a.id,a.title,a.type,a.price,b.name,a.img,a.updatetime')
		->limit(10)->order('a.updatetime desc')->select();
		foreach ($list as $k => $v) {
			$list[$k]['tname'] = getTypeName($v['type']);
		}

		//这里要获取轮播图 滚动公告
		$info = M('setting')->field('lunbo,notice')->find(1);
		$img = explode(',', $info['lunbo']);
		$I = M('images');
		foreach ($img as $k => $v) {
			$lunbo[] = $I->where('id=.'$v)->getField('savepath');
		}
		$this->assign('lunbo',$lunbo);
		$this->assign('list',$list);
		$this->display();
	}

}