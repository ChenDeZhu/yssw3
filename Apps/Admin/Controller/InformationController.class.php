<?php
namespace Admin\Controller;
use Think\Controller;

class InformationController extends BaseController{
	//显示列表页
	public function index(){
		$this->isLogin();
		$type = I('get.type');
		if($type == 0){
			$name = "招聘";
		}else if($type == 1){
			$name="求职";
		}else if($type == 2){
			$name="供应";
		}else if($type == 3){
			$name="求购";
		}else if($type == 4){
			$name="出租";
		}else if($type == 5){
			$name="转让";
		}
		$M = M('information');
		$where['type'] = $type;
		$count = $M->where($where)->count();
		$p = new \Think\Page($count, 15);
		$where1['a.type'] = $type;
		$list = $M->alias('a')->where($where1)
		->join('__USER__ b on b.uid = a.uid')
		->field('a.id,a.title,a.updatetime,b.name')
		->limit($p->firstRow,$p->listRows)
		->order('a.addtime desc')->select();
		$this->assign('list',$list);
		$this->assign('count',$count);
		$this->assign('page',$p->show());
		$this->assign('type',$type);
		$this->assign('name',$name);
		$this->display();
	}
	//显示添加页面
	public function add(){
		$type = I('get.type');
		if($type == 0){
			$name = "招聘";
		}else if($type == 1){
			$name="求职";
		}else if($type == 2){
			$name="供应";
		}else if($type == 3){
			$name="求购";
		}else if($type == 4){
			$name="出租";
		}else if($type == 5){
			$name="转让";
		}
		$clist = M('cate')->where(array('type'=>$type))->select();
		$this->assign('clist',$clist);
		$this->assign('type',$type);
		$this->assign('name',$name);
		$this->display();
	}
	//添加逻辑
	public function insert(){
		$M = M('information');
		$data = I('post.');
		$data['content'] = htmlspecialchars_decode($data['editorValue']);
		$data['addtime'] = time();
		$data['updatetime'] = $data['addtime'];

		$res = $M->add($data);
		if($res){
			if(!empty($_FILES['img']['tmp_name'])){
	            $info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = $data['type'].'_'.$res;
	                $slogoPath = $this->thumpic( $info['img'], '200', '200', $uniqu);
	                $M->where('id='.$res)->save(['img'=>ltrim($slogoPath, '.')]);       
	            }else{
		        	$M->delete($res);
		        	$this->error('添加失败！请重新添加！',U('information/index',array('type'=>$data['type'])));	
		        }
		  		}else{
		  			$this->success('添加成功！',U('information/index',array('type'=>$data['type'])));
		  		}
        }else{
        	$this->error('添加失败！请重新添加！',U('information/index',array('type'=>$data['type'])));
        }
	}
	//显示编辑页面
    public function upd(){
    	$this->isLogin();
		$info = M('information')->where('id='.I('get.id'))->find();
		$type = $info['type'];
		if($type == 0){
			$name = "招聘";
		}else if($type == 1){
			$name="求职";
		}else if($type == 2){
			$name="供应";
		}else if($type == 3){
			$name="求购";
		}else if($type == 4){
			$name="出租";
		}else if($type == 5){
			$name="转让";
		}

		$this->assign('type',$type);
		$this->assign('name',$name);
		$this->assign('info',$info);
		$this->display();
    }
    //编辑逻辑
    public function update(){
    	$data          = I('post.');
		$data['updatetime'] = time();
		$data['content'] = htmlspecialchars_decode($data['editorValue']);
		$res           = M('information')->where('id='.$data['id'])->save($data);
		if($res){
			if(!empty($_FILES['img']['tmp_name'])){
				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = $data['type'].'_'.$data['sid'];
	                $slogoPath = $this->thumpic( $info['img'], '200', '200', $uniqu);
	            }
            	$this->success('修改成功！',U('information/index',array('type'=>$data['type'])));
       		}else{
       			$this->success('修改成功！',U('information/index',array('type'=>$data['type'])));	
       		}
		}else{
			$this->error('系统错误！',U('information/index',array('type'=>$data['type'])));	
		}
    }




	







}