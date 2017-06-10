<?php
namespace Admin\Controller;
use Think\Controller;
/**
* banner类
*/
class SubController extends BaseController
{	
	public function index(){
		$this->isLogin();
		$count = D('sub')->count();
		$p = new \Think\Page($count, 15);
		$slist = D('sub')->limit($p->firstRow,$p->listRows)->order('sdate desc')->select();
		$this->assign('slist',$slist);
		$this->assign('count',$count);
		$this->assign('page',$p->show());
		$this->display();
	}
	//增
	public function add(){
		$this->isLogin();
		$catelist = D('cate')->select();
		$this->assign('catelist',$catelist);
		$this->display();
	}
	//插
	public function insert(){
		$data = I('post.');
		$data['sdate'] = date('Y-m-d H:i:s',time());
		$res = D('sub')->add($data);
		if($res){
			if(!empty($_FILES['slogo']['tmp_name'])){
	            $info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = 'spic_'.$res;
	                $slogoPath = $this->thumpic( $info['slogo'], '200', '200', $uniqu);
	                D('sub')->where('id='.$res)->save(['slogo'=>C('WEB_FOLDER').ltrim($slogoPath, '.')]);
	                $this->success('添加成功！',U('Sub/index'));
	            }
	        }else{
	        	D('sub')->delete($res);
	        	$this->error('添加失败！请重新添加！',U('Sub/index'));	
	        }
        }else{
        	$this->error('添加失败！请重新添加！',U('Sub/index'));
        }
	}
	//改
	public function upd(){
		$this->isLogin();
		$sinfo = D('sub')->where('id='.I('get.id'))->find();
		$catelist = D('cate')->select();
		$this->assign('catelist',$catelist);
		$this->assign('sinfo',$sinfo);
		$this->display();
	}
	//改插
	public function upting(){
		$data          = I('post.');
		$data['sdate'] = date('Y-m-d H:i:s',time());
		$res           = D('sub')->where('id='.$data['sid'])->save($data);
		if($res){
			if(!empty($_FILES['slogo']['tmp_name'])){
				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = 'spic_'.$data['sid'];
	                $slogoPath = $this->thumpic( $info['slogo'], '200', '200', $uniqu);
	            }
            	$this->success('修改成功！',U('sub/index'));
       		}else{
       			$this->success('修改成功！',U('sub/index'));
       		}
		}else{
			$this->error('系统错误！',U('sub/index'));
		}
	}
	//删除
	public function del(){
		$id = trim(I('get.Mid'));
		$image_path = './Uploads/Logos/' . $file['savepath'] . 'spic_' . $id . '.png';
		@unlink($image_path);
		$res = D('sub')->delete($id);
		return $res;
	}
}