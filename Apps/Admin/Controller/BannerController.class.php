<?php
namespace Admin\Controller;
use Think\Controller;
/**
* banner类
*/
class BannerController extends BaseController
{	
	public function index(){
		$this->getList('banner', 'sort asc', 'blist');
	}
	//增
	public function add(){
		$this->isLogin();
		$this->display();
	}
	//插
	public function insert(){
		$data = I('post.');
		$data['bdate'] = date('Y-m-d H:i:s',time());
		$res = D('banner')->add($data);
		if($res){
			if(!empty($_FILES)){
	            $info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = 'bpic_'.$res;
	                $blogoPath = $this->thumpic( $info['blogo'], '1920', '800', $uniqu);
	                D('banner')->where('id='.$res)->save(['blogo'=>C('WEB_FOLDER').ltrim($blogoPath, '.')]);
	                $this->success('添加成功！',U('Banner/index'));
	            }
	        }else{
	        	D('banner')->delete($res);
	        	$this->error('添加失败！请重新添加！',U('Banner/index'));	
	        }
        }else{
        	$this->error('添加失败！请重新添加！',U('Banner/index'));
        }
	}
	//改
	public function upd(){
		$this->isLogin();
		$binfo = D('banner')->where('id='.I('get.id'))->find();
		$this->assign('binfo',$binfo);
		$this->display();
	}
	//改插
	public function upting(){
		$data          = I('post.');
		$data['bdate'] = date('Y-m-d H:i:s',time());
		$res           = D('banner')->where('id='.$data['bid'])->save($data);
		if($res){
			if(!empty($_FILES['blogo']['tmp_name'])){
				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = 'bpic_'.$data['bid'];
	                $blogoPath = $this->thumpic( $info['blogo'], '1920', '800', $uniqu);
	            }
            	$this->success('修改成功！',U('Banner/index'));
       		}else{
       			$this->success('修改成功！',U('Banner/index'));
       		}
		}else{
			$this->error('系统错误！',U('Banner/index'));
		}
	}
	//删除
	public function del(){
		$id = trim(I('get.Mid'));
		$image_path = './Uploads/Logos/' . $file['savepath'] . 'bpic_' . $id . '.png';
		@unlink($image_path);
		$res = D('banner')->delete($id);
		return $res;
	}
}