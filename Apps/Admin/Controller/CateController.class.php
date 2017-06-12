<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 
*/
class CateController extends BaseController
{
	public function index(){

		$this->isLogin();
		$type = I('get.type');
		$name = getTypeName($type);
		$where['type'] = $type;
		$count = M('cate')->where($where)->count();
		$p = new \Think\Page($count, 15);
		$clist = M('cate')->where($where)->limit($p->firstRow,$p->listRows)->order('sort desc')->select();
		// var_dump($clist);exit;
		$clist = D('cate')->tree($clist);
		// var_dump($clist);exit;
		$this->assign(array(
			'clist'=>$clist,
			'count'=>$count,
			'page'=>$p->show(),
			'type'=>$type,
			'name'=>$name,
			));

		$this->display();
	}
	//增
	public function add(){
		$this->isLogin();
		$type = I('get.type');
		$name = getTypeName($type);
		$where['type'] = $type;

		$clist = M('cate')->where($where)->order('sort desc')->select();
		$clist = D('cate')->tree($clist);
		$this->assign(array(
			'name'=>$name,
			'clist'=>$clist,
			'type'=>$type,
			));
		$this->display();
	}
	//插
	public function insert(){
		$data = I('post.');
		$data['addtime'] = time();
		$res = M('cate')->add($data);
	
	if($res){
			if(!empty($_FILES['img']['tmp_name'])){
 				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                
	                $uniqu = $data['type'].'__'.$res;
	                $plogopath = $this->thumpic( $info['img'], '504', '314', $uniqu);

	                M('cate')->where('cid='.$res)->save(['img'=>C('WEB_FOLDER').ltrim($plogopath, '.')]);
	                
	                $this->success('添加成功！',U('cate/index',array('type'=>$data['type'])));
	                	                
	            }else{
	            	$this->error('系统错误！',U('cate/index',array('type'=>$data['type'])));
	            }
	        }else{
	                $this->success('添加成功！',U('cate/index',array('type'=>$data['type'])));           
	        		}
	        
	}else{
		$this->error('系统错误！',U('cate/index',array('type'=>$data['type'])));
	}        


	}
	//改
	public function upd(){
		$this->isLogin();

		$info = M('cate')->where('cid='.I('get.id'))->find();
		$type = $info['type'];
		$name = getTypeName($type);
		$where['type'] = $type;
		$clist = M('cate')->where($where)->order('sort desc')->select();
		$clist = D('cate')->tree($clist);

		$this->assign(array(
			'name'=>$name,
			'clist'=>$clist,
			'type'=>$type,
			'info'=>$info,
			));
		// var_dump($info);
		$this->display();
	}
	//改插
	public function update(){
		$data          = I('post.');
		$res = M('cate')->save($data);
		if($res!==false){
			if(!empty($_FILES['img']['tmp_name'])){
				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = $data['type'].'__'.$data['cid'];

	                $plogoPath = $this->thumpic( $info['img'], '504', '314', $uniqu);
	                M('cate')->where('cid='.$data['cid'])->save(['img'=>C('WEB_FOLDER').ltrim($plogoPath, '.')]);
	                $this->success('修改成功！',U('Cate/index',array('type'=>$data['type'])));
	            }
            	
       		}else{
       			$this->success('修改成功！',U('Cate/index',array('type'=>$data['type'])));
       		}
		}else{
			$this->error('系统错误！',U('Cate/index',array('type'=>$data['type'])));
		}
	}
	//删除
	public function del(){
		$id = trim(I('get.Mid'));
		$M = M('information');
		$nlist = $M->where('cid='.$id)->select();
		if(is_array($nlist)){
			foreach ($nlist as $k => $v) {
				$image_path = '.'.$v['img'];
				@unlink($image_path);
			}
		}
		//删除栏目的图片
		// $image_path = './Uploads/Logos/' . $file['savepath'] . 'ppic_' . $id . '.png';
		// @unlink($image_path);
		$res = $M->where('cid='.$id)->delete();
		$res = M('cate')->where('cid='.$id)->delete();
		return $res;
	}
}