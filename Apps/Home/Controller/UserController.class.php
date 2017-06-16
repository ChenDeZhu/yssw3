<?php
namespace Home\Controller;
use Think\Controller;
vendor('Pay.lib.JSSDK');
class UserController extends BaseController{
	static public $uid;
	public function _initialize(){
		session('uid',1);
		$uid = $_SESSION['uid'];
		$user = M('user')->find($uid);
		$this->assign('user',$user);
	}
	//个人信息主页
	public function my(){
		//判断是否注册过
		$this->isLogin();
		$M = M('user');
		$uid = $_SESSION['uid'];
		//获取该用户的推广记录
		$list = $M->where('tid='.$uid)->field('uid,name,img,reg_time')->order('reg_time desc')->select();
		// var_dump($list);exit;
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
		//取得推广佣金
		$where['uid'] = $uid;
		$where['type'] = 3;
		$tmoney = M('money_detail')->field('money')->where($where)->sum('money');
		$this->assign('list',$list);
		$this->assign('tmoney',$tmoney);
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
		$uid = $_SESSION['uid'];
		$list = M('money_detail')->where('uid='.$uid)->field('addtime,money,type')->order('addtime desc')->select();
		$this->assign('list',$list);
		$this->display();
	}
	//更新会员信息
	public function update_members(){
		$this->isLogin();
		if(IS_POST){
			$data = $_POST;

			if($data['pwd']){
				$data['pwd'] = md5($data['pwd']);
			}
			// var_dump($data);exit;
			$res = M('user')->save($data);
			if($res!==false){
				$this->ajaxReturn(1);
			}else{
				$this->ajaxReturn(0);
			}
		}else{
			
			$this->display();
		}
	}
	//开通VIP
	public function addvip(){
		$this->isLogin();
		if(IS_POST){
			$data = $_POST;
			$M = M('company');
			if($data['gid']){
				$res = $M->save($data);
				if($res){
					$this->ajaxReturn(1);
				}else{
					$this->ajaxReturn(2);
				}
			}
			
			$res = $M->add($data);
			if($res!==false){
				$this->ajaxReturn(1);
			}else{
				$this->ajaxReturn(0);
			}
		}else{
			$uid = $_SESSION['uid'];
			$company = M('company')->where('uid='.$uid)->find();
			if($company){
				$this->assign('company',$company);
			}
			$this->display();
		}
}
	//客服
	public function service(){
		$this->isLogin();
		
		$this->display();
	}
	//自己推广下线的内容
	public function extension_content(){
		$this->isLogin();
		$uid = I('get.uid');
		$M = M('user');
		$map['a.uid'] = $uid;
		$other = $M->alias('a')->where($map)
		->join("__USER__ b on b.uid = a.tid")->field('a.name,a.province,a.city,a.area,b.name as tname,a.img')->find();
		$count = $M->where('tid='.$uid)->count();
		//获取该用户的推广一级推广记录
		$list = $M->where('tid='.$uid)->field('uid,name,img,reg_time')->order('reg_time desc')->select();
		$this->assign('other',$other);
		$this->assign('count',$count);
		$this->assign('list',$list);
		$this->display();
	}
	//发布信息
	public function addinfo(){
		if(IS_POST){
			$data= $_POST;
			$getimg = new JSSDK("wx53630ec8fbb17ecb","3bbfec4499541a3499f30cf97bbd5b67");
			
			if($data['images']){
				$I = M('images');
				foreach ($data['images'] as $k => $v) {
					if($k == 0){
						//将第一张作为首页显示的图片
						$data['img'] = $getimg->download($v);
					}
					$newdata['savepath']=$getimg->download($v);
					$imgId[] = $I->add($newdata);
				}
				//拼接成字符串
				$data['img_id'] =implode(',',$imgId);

			}



			$res = M('information')->add($data);
			if($res){
				$this->ajaxReturn(1);
			}else{
				$this->ajaxReturn(0);
			}
		}else{
			$this->isLogin();
			$type = I('get.type');
			$name = getTypeName($type);
			$clist = M('cate')->where('type='.$type)->select();
			$this->assign('clist',$clist);
			$this->assign('type',$type);
			$this->assign('name',$name);
			$this->display();
		}
	}

	public function user_work_experience(){
		if(IS_POST){
			$data = $_POST;
			
			$res = M('user')->save($_POST);
			if($res!==false){
				$this->ajaxReturn(1);
			}else{
				$this->ajaxReturn(0);
			}
		}else{
			$this->display();
		}
	}
}