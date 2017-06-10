<?php
namespace Admin\Controller;
use Think\Controller;

class ProductController extends BaseController
{
	public function index(){
		$this->isLogin();
		$condition = '';
		$key       = I('param.key');
		if(!empty($key)){
			$condition = "title like '%".$key."%'";
		}
		$count = D('product')->where($condition)->count();
		$p = new \Think\Page($count, 15);
		$plist = D('product')->where($condition)->limit($p->firstRow,$p->listRows)->order('pdate desc')->select();
		if(is_array($plist)){
			foreach ($plist as $k => $v) {
				$plist[$k]['cname'] = $this->getCname('pcate' ,$v['pid']);
			}
		}
		$this->assign('plist',$plist);
		$this->assign('count',$count);
		$this->assign('page',$p->show());
		$this->display();
	}
	//增
	public function add(){
		$this->isLogin();
		$clist = $this->getCateList('pcate');
		$this->assign('clist',$clist);
		$this->display();
	}
	//插入
	public function insert(){		
		$data = I('post.');
		$data['content'] = htmlspecialchars_decode($data['editorValue']);
		$data['pdate'] = date('Y-m-d H:i:s', time());
		$res = D('product')->add($data);
		if($res){
			if(!empty($_FILES['plogo']['tmp_name'])){
 				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = 'ppic_'.$res;
	                $plogopath = $this->thumpic( $info['plogo'], '504', '314', $uniqu);
	                D('product')->where('id='.$res)->save(['plogo'=>C('WEB_FOLDER').ltrim($plogopath, '.')]);
	                if($data['submit'] != ''){
	                	$this->success('添加成功！',U('Product/index'));
	                }else{
	                	$this->success('添加成功！',U('Product/add'));
	                }	                
	            }
	        }else{
	        	D('product')->delete($res);
	        	$this->error('系统错误！',U('Product/index'));	
	        }
		}else{
			$this->error('系统错误！',U('Product/index'));
		}
		
	}
	//改
	public function upd(){
		$this->isLogin();
		$pinfo = D('product')->where('id='.I('get.id'))->find();
		$plist = $this->getCateList('pcate');
		$this->assign('plist',$plist);
		$this->assign('pinfo',$pinfo);
		$this->display();
	}
	//改插
	public function upting(){
		$data            = I('post.');
		$data['pdate']   = date('Y-m-d H:i:s',time());
		$data['content'] = $data['content'] = htmlspecialchars_decode($data['editorValue']);
		$res             = D('Product')->where('id='.$data['nid'])->save($data);
		if($res){
			if(!empty($_FILES['plogo']['tmp_name'])){
				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = 'ppic_'.$data['nid'];
	                $plogoPath = $this->thumpic( $info['plogo'], '504', '314', $uniqu);
	            }
            	$this->success('修改成功！',U('Product/index'));
       		}else{
       			$this->success('修改成功！',U('Product/index'));
       		}
		}else{
			$this->error('系统错误！',U('Product/index'));
		}
	}
	//删除
	public function del(){
		$id = trim(I('get.Mid'));
		$image_path = './Uploads/Logos/' . $file['savepath'] . 'ppic_' . $id . '.png';
		@unlink($image_path);
		$res = D('product')->delete($id);
		return $res;
	}
}