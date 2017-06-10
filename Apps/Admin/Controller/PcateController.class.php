<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 
*/
class PcateController extends BaseController
{
	public function index(){
		$this->getList('pcate', 'sort asc', 'clist');
	}
	//增
	public function add(){
		$this->isLogin();
		$this->display();
	}
	//插
	public function insert(){
		$data = I('post.');
		$data['cdate'] = date('Y-m-d H:i:s',time());
		$res = D('pcate')->add($data);
		if($res){
			$this->success('添加成功！',U('Cate/index'));
		}else{
			$this->error('添加失败，请重新添加！',U('Cate/index'));
		}
	}
	//改
	public function upd(){
		$this->isLogin();
		$cateinfo = D('pcate')->where('id='.I('get.id'))->find();
		$this->assign('cateinfo',$cateinfo);
		$this->display();
	}
	//改插
	public function upting(){
		$data          = I('post.');
		$data['cdate'] = date('Y-m-d H:i:s',time());
		$res           = D('pcate')->where('id='.$data['cid'])->save($data);
		if($res){
			$this->success('修改成功！',U('pcate/index'));
		}else{
			$this->error('修改失败，请重新修改！',U('pcate/index'));
		}
	}
	//删除
	public function del(){
		$id = trim(I('get.Mid'));
		$plist = D('product')->where('pid='.$id)->select();
		if(is_array($plist)){
			foreach ($plist as $k => $v) {
				$image_path = '.'.$v['plogo'];
				@unlink($image_path);
			}
		}
		$res = D('product')->where('pid='.$id)->delete();
		$res = D('pcate')->where('id='.$id)->delete();
		return $res;
	}
}