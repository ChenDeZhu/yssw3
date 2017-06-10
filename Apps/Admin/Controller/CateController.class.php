<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 
*/
class CateController extends BaseController
{
	public function index(){
		// $this->getList('cate', 'sort asc', 'clist');

		$this->isLogin();
		$count = M('cate')->count();
		$p = new \Think\Page($count, 15);
		$clist = M('cate')->limit($p->firstRow,$p->listRows)->order('sort desc')->select();
		$this->assign('clist',$clist);
		$this->assign('count',$count);
		$this->assign('page',$p->show());
		$this->display();




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
		$res = M('cate')->add($data);
		if($res){
			$this->success('添加成功！',U('Cate/index'));
		}else{
			$this->error('添加失败，请重新添加！',U('Cate/index'));
		}
		// if($res){
		// 	if(!empty($_FILES['slogo']['tmp_name'])){
	 //            $info = $this->uploadfile($_FILES);
	 //            if(!empty($info)){
	 //                //处理logo
	 //                $uniqu = 'spic_'.$res;
	 //                $slogoPath = $this->thumpic( $info['slogo'], '200', '200', $uniqu);
	 //                M('sub')->where('id='.$res)->save(['slogo'=>C('WEB_FOLDER').ltrim($slogoPath, '.')]);
	 //                $this->success('添加成功！',U('Sub/index'));
	 //            }
	 //        }else{
	 //        	D('sub')->delete($res);
	 //        	$this->error('添加失败！请重新添加！',U('Sub/index'));	
	 //        }
  //       }else{
  //       	$this->error('添加失败！请重新添加！',U('Sub/index'));
  //       }
	}
	//改
	public function upd(){
		$this->isLogin();
		$cateinfo = M('cate')->where('id='.I('get.id'))->find();
		$this->assign('cateinfo',$cateinfo);
		$this->display();
	}
	//改插
	public function upting(){
		$data          = I('post.');
		$data['cdate'] = date('Y-m-d H:i:s',time());
		$res           = M('cate')->where('id='.$data['cid'])->save($data);
		if($res){
			$this->success('修改成功！',U('Cate/index'));
		}else{
			$this->error('修改失败，请重新修改！',U('Cate/index'));
		}
	}
	//删除
	public function del(){
		$id = trim(I('get.Mid'));
		$nlist = M('news')->where('cid='.$id)->select();
		if(is_array($nlist)){
			foreach ($nlist as $k => $v) {
				$image_path = '.'.$v['nlogo'];
				@unlink($image_path);
			}
		}
		$res = M('news')->where('cid='.$id)->delete();
		$res = M('cate')->where('id='.$id)->delete();
		return $res;
	}
}