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
		$info = M('setting')->field('img_id,notice')->find(1);
		if($info['img_id']){
                $image = M("images");
                $map['id']=array('in',$info['img_id']);
                $img_info = $image->where($map)->order('id asc')->select();
                $this->assign("img_info", $img_info);
            }

		$this->assign('info',$info);
		$this->assign('list',$list);
		$this->display();
	}

}