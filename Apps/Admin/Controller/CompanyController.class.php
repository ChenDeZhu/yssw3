<?php
namespace Admin\Controller;
use Think\Controller;

class CompanyController extends BaseController{
	public function index(){
		$this->isLogin();
		$where =array();
		$key       = I('param.key');
		
		if(!empty($key)){
			$where['name'] = array('like',"%$key%");
		}
		$M = M('company');
		$count = $M->where($where)->count();
		$p = new \Think\Page($count, 15);
		$list = $M->where($where)->limit($p->firstRow,$p->listRows)->order('addtime desc')->select();
		$this->assign('count',$count);
		$this->assign('list',$list);
		$this->assign('page',$p->show());
		$this->display();	
	}

	public function add(){
		$this->isLogin();
		$this->display();
	}

	public function insert(){
		$data = I('post.');
		$data['addtime'] = time();
		$data['content'] = htmlspecialchars_decode($data['editorValue']);
		$res = M('company')->add($data);
		if($res){
				if(!empty($_FILES['img']['tmp_name'])){
	 				$info = $this->uploadfile($_FILES);
		            if(!empty($info)){
		                //处理logo
		                $uniqu = 'company__'.$res;
		                $plogopath = $this->thumpic( $info['img'], '500', '500', $uniqu);
		                M('company')->where('gid='.$res)->save(['img'=>C('WEB_FOLDER').ltrim($plogopath, '.')]);
		                $this->success('添加成功！',U('Company/index'));
		            }else{
		            	$this->error('系统错误！',U('Company/index'));
		            }
		        }else{
		                $this->success('添加成功！',U('Company/index'));           
		        		}
		}else{
			$this->error('系统错误！',U('Company/index'));
		}        

	}

	public function upd(){
		$this->isLogin();
		$info = M('company')->where('gid='.I('get.id'))->find();
		// var_dump($info);
		$this->assign('info',$info);
		$this->display();
	}

	public function update(){
		$data          = I('post.');
		$res = M('company')->save($data);
		$data['content'] = htmlspecialchars_decode($data['editorValue']);
		if($res!==false){
			if(!empty($_FILES['img']['tmp_name'])){
				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = 'company__'.$data['id'];

	                $plogoPath = $this->thumpic( $info['img'], '500', '500', $uniqu);
	                M('company')->where('gid='.$data['gid'])->save(['img'=>C('WEB_FOLDER').ltrim($plogoPath, '.')]);
	                $this->success('修改成功！',U('Company/index'));
	            }
            	
       		}else{
       			$this->success('修改成功！',U('Company/index'));
       		}
		}else{
			$this->error('系统错误！',U('Company/index'));
		}
	}

	public function del(){
		$id = trim(I('get.Mid'));
		// $image_path = './Uploads/Logos/' . $file['savepath'] . 'ppic_' . $id . '.png';
		// @unlink($image_path);
		$res = M('company')->delete($id);
		return $res;
	}



}