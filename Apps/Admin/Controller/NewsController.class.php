<?php
namespace Admin\Controller;
use Think\Controller;

class NewsController extends BaseController
{
	public function index(){
		$this->isLogin();
		$condition = '';
		$key       = I('param.key');
		if(!empty($key)){
			$condition = "title like '%".$key."%'";
		}
		$count = M('news')->where($condition)->count();
		$p = new \Think\Page($count, 15);
		$nlist = M('news')->where($condition)->limit($p->firstRow,$p->listRows)->order('ndate desc')->select();
		if(is_array($nlist)){
			foreach ($nlist as $k => $v) {
				$nlist[$k]['cname'] = $this->getCname('cate' ,$v['cid']);
			}
		}
		$this->assign('nlist',$nlist);
		$this->assign('count',$count);
		$this->assign('page',$p->show());
		$this->display();
	}
	//增
	public function add(){
		$this->isLogin();
		$clist = $this->getCateList('cate');
		$this->assign('clist',$clist);
		$this->display();
	}
	//插入
	public function insert(){		
		$data = I('post.');
		$data['content'] = htmlspecialchars_decode($data['editorValue']);
		$data['ndate'] = date('Y-m-d H:i:s', time());
		$res = D('news')->add($data);
		if($res){
			if(!empty($_FILES['nlogo']['tmp_name'])){
 				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = 'npic_'.$res;
	                $nlogoPath = $this->thumpic( $info['nlogo'], '321', '211', $uniqu);
	                D('news')->where('id='.$res)->save(['nlogo'=>C('WEB_FOLDER').ltrim($nlogoPath, '.')]);
	                if($data['submit'] != ''){
	                	$this->success('添加成功！',U('News/index'));
	                }else{
	                	$this->success('添加成功！',U('News/add'));
	                }	                
	            }
	        }else{
	        	D('sub')->delete($res);
	        	$this->error('系统错误！',U('News/index'));	
	        }
		}else{
			$this->error('系统错误！',U('News/index'));
		}
		
	}
	//改
	public function upd(){
		$this->isLogin();
		$ninfo = D('news')->where('id='.I('get.id'))->find();
		$clist = $this->getCateList('cate');
		$this->assign('clist',$clist);
		$this->assign('ninfo',$ninfo);
		$this->display();
	}
	//改插
	public function upting(){
		$data            = I('post.');
		$data['ndate']   = date('Y-m-d H:i:s',time());
		$data['content'] = $data['content'] = htmlspecialchars_decode($data['editorValue']);
		$res             = D('news')->where('id='.$data['nid'])->save($data);
		if($res){
			if(!empty($_FILES['nlogo']['tmp_name'])){
				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = 'npic_'.$data['nid'];
	                $slogoPath = $this->thumpic( $info['nlogo'], '321', '211', $uniqu);
	            }
            	$this->success('修改成功！',U('News/index'));
       		}else{
       			$this->success('修改成功！',U('News/index'));
       		}
		}else{
			$this->error('系统错误！',U('News/index'));
		}
	}
	//删除
	public function del(){
		$id = trim(I('get.Mid'));
		$image_path = './Uploads/Logos/npic_' . $id . '.png';
		@unlink($image_path);
		$res = D('news')->delete($id);
		return $res;
	}
}