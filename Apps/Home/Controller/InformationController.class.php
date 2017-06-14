<?php
namespace Home\Controller;
use Think\Controller;
class InformationController extends BaseController{
	public function index(){
		$this->isLogin();
		$type = I('get.type');
		$M = M('information');
		$where['type'] = $type;
		$list = $M->where($where)->order('addtime desc')->select();
		$this->assign('list',$list);
		$this->display();
	}
	//信息详情页
	public function detail(){
		$this->isLogin();
		$uid = $_SESSION['uid'];
		$M = M('information');
		
		$id = I('get.id');
		//阅读数加一
		$M->where('id='.$id)->setInc('click'); 
		$info =$M->find($id);
		$info['cname'] = M('cate')->where('cid='.$info['cid'])->getField('name');
		$info['tname'] = getTypeName($info['type']);
		//添加访问信息
		if($info['uid'] !=$uid){

			$map['uid'] = $uid;
			$map['fid'] = $id;
			//查询出之前该用户有没有看过该信息
			$iId = M('interactive')->where($map)->field('id')->find();
			if(!$iId){
				//若没有看过 则添加
				$data = array(
				'uid' => $uid,
				'fid' => $id,
				'fuid' => $info['uid'],
				'addtime'=>time(),
				'type'=>$info['type'],
				);
				M('interactive')->add($data);

			}else{
				//若之前看过 则阅读数加1
				M('interactive')->where('id='.$iId['id'])->setInc('click');
			}
		}
		$this->assign('info',$info);
		$this->display();
	}
	//人才管理
	public function personnel(){
		$clist = M('cate')->field('cid,name,pid')->where('type=0 or type=1')->select();
		$clist = D('cate')->tree($clist);
		$map = array();
		if(I('get.cid')){
			$cid = I('get.cid');
			$map['a.cid'] = $cid;
			$this->assign('cid',$cid);
		}
		$list = M('information')->alias('a')
		->where('a.type=0 or a.type=1')
		->where($map)
		->join('__CATE__ b on b.cid = a.cid')
		->field('a.type,a.title,a.id,a.updatetime,a.price,b.name as cname')
		->order('a.updatetime desc')->select();
		foreach ($list as $k => $v) {
			$list[$k]['tname']  = getTypeName($v['type']);
		}
		$this->assign('list',$list);
		$this->assign('clist',$clist);
		
		$this->display();
	}
	//供求管理
	public function supply(){
		$clist = M('cate')->field('cid,name,pid')->where('type=2 or type=3')->select();
		$clist = D('cate')->tree($clist);
		$map = array();
		if(I('get.cid')){
			$cid = I('get.cid');
			$map['a.cid'] = I('get.cid');
			$this->assign('cid',$cid);
		}
		$list = M('information')->alias('a')
		->where('a.type=2 or a.type=3')
		->where($map)
		->join('__CATE__ b on b.cid = a.cid')
		->field('a.type,a.title,a.id,a.updatetime,a.price,b.name as cname,a.img')
		->order('a.updatetime desc')->select();
		foreach ($list as $k => $v) {
			$list[$k]['tname']  = getTypeName($v['type']);
		}
		$this->assign('list',$list);
		$this->assign('clist',$clist);
		
		$this->display();
	}

	public function rentto(){
		$clist = M('cate')->field('cid,name,pid')->where('type=4 or type=5')->select();
		$clist = D('cate')->tree($clist);
		$map = array();
		if(I('get.cid')){
			$cid = I('get.cid');
			$map['a.cid'] = I('get.cid');
			$this->assign('cid',$cid);
		}
		$list = M('information')->alias('a')
		->where('a.type=4 or a.type=5')
		->where($map)
		->join('__CATE__ b on b.cid = a.cid')
		->field('a.type,a.title,a.id,a.updatetime,a.price,b.name as cname,a.img')
		->order('a.updatetime desc')->select();
		foreach ($list as $k => $v) {
			$list[$k]['tname']  = getTypeName($v['type']);
		}
		$this->assign('list',$list);
		$this->assign('clist',$clist);
		$this->display(); 

	}



}