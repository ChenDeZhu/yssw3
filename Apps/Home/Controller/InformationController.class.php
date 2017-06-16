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
		//获取多图
		if($info['img_id']){
			 $image = M("images");
                $map['id']=array('in',$info['img_id']);
                $img_info = $image->where($map)->order('id asc')->select();
                $this->assign("img_info", $img_info);
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
	//下拉刷新
	public function upRefresh(){
		$data = $_POST;
		$first = $data['first'];
		if($data['type'] == "rentto"){
			$str = "(a.type = 4)or(a.type = 5)";
		}else if($data['type'] == "personnel"){
			$str = "(a.type = 0)or(a.type = 1)";
		}else if($data['type'] == "supply"){
			$str = "(a.type = 2)or(a.type = 3)";
		}
		$last = $first+10;
		$M = M('information');
		$list = $M->alias('a')->join('__CATE__ b on b.cid = a.cid')
		->where("$str")
		->field('a.id,a.title,a.type,a.price,b.name,a.img,a.updatetime')
		->limit($first,$last)->order('a.updatetime desc')->select();
		foreach ($list as $k => $v) {
			$list[$k]['tname'] = getTypeName($v['type']);
			$list[$k]['date'] = date("Y-m-d",$v['updatetime']);
			if(!$v['img']){
				$list[$k]['img']="/public/home/template/images/nopic.png";
			}
		}
		
		if($list){
			$this->ajaxReturn(array('status'=>1,'data'=>$list));
		}else{
			$this->ajaxReturn(array('status'=>0));
		}
	}
	

}