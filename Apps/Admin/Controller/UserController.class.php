<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends BaseController{
	//用户列表页
	public function index(){
		$this->isLogin();
		$where =array();
		$key       = I('param.key');
		
		if(!empty($key)){
			$where['name'] = array('like',"%$key%");
		}
		$M = M('user');
		$count = $M->where($where)->count();
		$p = new \Think\Page($count, 15);
		$list = $M->where($where)->limit($p->firstRow,$p->listRows)->order('reg_time desc')->select();
		$this->assign(array(
			'list'=>$list,
			'count'=>$count,
			'page'=>$p->show(),
			));
		$this->display();
	}
	//编辑页
	public function add(){
		$this->display();
	}
	// 添加
	public function insert(){
		$data = I('post.');
		$data['addtime'] = time();
		$res = M('user')->add($data);
		if($res){
				if(!empty($_FILES['img']['tmp_name'])){
	 				$info = $this->uploadfile($_FILES);
		            if(!empty($info)){
		                //处理logo
		                $uniqu = 'user__'.$res;
		                $plogopath = $this->thumpic( $info['img'], '500', '500', $uniqu);
		                M('user')->where('uid='.$res)->save(['img'=>C('WEB_FOLDER').ltrim($plogopath, '.')]);
		                $this->success('添加成功！',U('User/index'));
		            }else{
		            	$this->error('系统错误！',U('User/index'));
		            }
		        }else{
		                $this->success('添加成功！',U('User/index'));           
		        		}
		}else{
			$this->error('系统错误！',U('User/index'));
		}        
	}
	//编辑页面
	public function upd(){
		$this->isLogin();
		$info = M('user')->where('uid='.I('get.id'))->find();
		
		$this->assign('info',$info);
		$this->display();

	}
	public function update(){
		$data          = I('post.');
		$res = M('user')->save($data);
		if($res!==false){
			if(!empty($_FILES['img']['tmp_name'])){
				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = 'user__'.$data['uid'];

	                $plogoPath = $this->thumpic( $info['img'], '500', '500', $uniqu);
	                M('user')->where('uid='.$data['uid'])->save(['img'=>C('WEB_FOLDER').ltrim($plogoPath, '.')]);
	                $this->success('修改成功！',U('User/index'));
	            }
            	
       		}else{
       			$this->success('修改成功！',U('User/index'));
       		}
		}else{
			$this->error('系统错误！',U('User/index'));
		}
	}
	
	public function del(){
		$id = trim(I('get.Mid'));
		$image_path = './Uploads/Logos/user__' . $id . '.png';
		@unlink($image_path);
		$res = M('user')->delete($id);
		return $res;
	}
	


}