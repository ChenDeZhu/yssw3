<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController{
	static public $uid;
	public function _initialize(){
		session('uid',1);
		$uid = $_SESSION['uid'];
		$user = M('user')->find($uid);
		$this->assign('user',$user);
	}
	public function my(){
		//判断是否注册过
		$this->isLogin();
		$M = M('user');
		$uid = $_SESSION['uid'];
		//获取该用户的推广记录
		$list = $M->where('tid='.$uid)->field('uid,name,img,reg_time')->order('reg_time desc')->select();
		$this->assign('list',$list);
		$this->display();
	}
	//我发布的信息
	public function myPush(){
		$this->isLogin();
		$uid = $_SESSION['uid'];
		//获取用户信息
		$M = M('information');
		$where = array(
			'a.uid'=>$uid,
			);
		//获取所有改会员发过的内容
		$list = $M->alias('a')->where($where)->join('__CATE__ b on b.cid = a.cid')->field('a.id,a.type,a.img,a.addtime,a.title,b.name')->order('a.addtime desc')->select();
		foreach ($list as $k => $v) {
			$list[$k]['type'] = getTypeName($v['type']);
		}
		$this->assign('list',$list);
		$this->display();
	}
	//我的推广 
	public function promote(){
		$this->isLogin();
		$uid = $_SESSION['uid'];
		$M = M('user');
		//查询个人信息
		$map['tid'] = $uid;
		$count = $M->where($map)->count();
		//查询一级下线
		$list = $M->where($map)->field('uid,name,reg_time,img')->order('reg_time desc')->select();
		//查询出二级下线
		$list1 = array();
		foreach ($list as $k => $v) {
			$list1[] =$M->alias('a')->where('a.tid='.$v['uid'])->join('__USER__ b on a.tid = b.uid ')->field('a.uid,a.name,a.reg_time,a.img,b.name as tname')->order('a.reg_time desc')->select(); 
		}

		$this->assign('list',$list);
		$this->assign('list1',$list1);
		$this->assign('count',$count);
		$this->display();
	}

	//我阅读过的信息
	public function my_footprint(){
		$this->isLogin();
		$uid = $_SESSION['uid'];
		$list = M('interactive')->alias('a')->where('a.uid='.$uid)
		->join('__INFORMATION__ b on b.id = a.fid')
		->join('__CATE__ c on c.cid = b.cid')
		->field('a.addtime,b.title,b.type,c.name,b.img')->order('a.addtime desc')->select();
		foreach ($list as $k => $v) {
			$list[$k]['tname'] = getTypeName($v['type']);
		}
		$this->assign('list',$list);
		// var_dump($list);exit;
		$this->display();
	}

	//阅读过我的信息
	public function readme(){
		$this->isLogin();
		$uid = $_SESSION['uid'];
		$list = M('interactive')->alias('a')->where('a.fuid='.$uid)
		->join('__INFORMATION__ b on b.id = a.fid')
		->join('__USER__ c on c.uid = a.uid')
		->field('a.addtime,a.click,b.title,c.name,c.img')->order('a.addtime desc')->select();
		$this->assign('list',$list);
		$this->display();
	}
	//发布
	public function add_information(){
		$this->isLogin();
		$this->display();
	}
	//账户
	public function account(){
		$this->isLogin();

		$this->display();
	}
	//更新会员信息
	public function update_members(){
		$this->isLogin();

		$this->display();
	}
	//开通VIP
	public function addvip(){
		$this->isLogin();

		$this->display();
	}
	//客服
	public function service(){
		$this->isLogin();
		
		$this->display();
	}
}