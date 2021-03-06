<?php
namespace Admin\Controller;
use Think\Controller;

class InformationController extends BaseController{
	//显示列表页
	public function index(){
		$this->isLogin();

		$key       = I('param.key');
		
		if(!empty($key)){
			$where['title'] = "title like '%".$key."%'";
			$where1['a.title'] = array('like',"%$key%");
		}
		$type = I('get.type');
		$name = getTypeName($type);
		$M = M('information');
		$where['type'] = $type;
		$count = $M->where($where)->count();
		$p = new \Think\Page($count, 15);
		$where1['a.type'] = $type;
		$list = $M->alias('a')->where($where1)
		->join('__USER__ b on b.uid = a.uid')
		->join('__CATE__ c on c.cid = a.cid')
		->field('a.id,a.title,a.updatetime,b.name,c.name as cname,a.img')
		->limit($p->firstRow,$p->listRows)
		->order('a.addtime desc')->select();
		
		$this->assign(array(
			'list'=>$list,
			'count'=>$count,
			'page'=>$p->show(),
			'type'=>$type,
			'name'=>$name,
			));
		$this->display();
	}
	//显示添加页面
	public function add(){
		$type = I('get.type');
		$name = getTypeName($type);
		$clist = M('cate')->where(array('type'=>$type))->select();
		$ulist = M('user')->field('uid,name')->select();
		$this->assign('ulist',$ulist);
		$this->assign('clist',$clist);
		$this->assign('type',$type);
		$this->assign('name',$name);
		$this->display();
	}
	//添加逻辑
	public function insert(){
		$M = M('information');
		$M_image = M('images');
		$data = I('post.');
		$data['content'] = htmlspecialchars_decode($data['content']);
		$data['addtime'] = time();
		$data['updatetime'] = $data['addtime'];
		unset($data['editorValue']);
		if($data['lunbo']){
		 	if(is_array($data['lunbo'])){

                $image_id=array();
                foreach($data['lunbo'] as $k=>$v){
                    $img_data['savepath']=$v;
                    if($v)
                    $image_id[$k]=$M_image->add($img_data);
                }
                $data['img_id']=implode(',',$image_id);
            }
        }
		$res = $M->add($data);
		if($res){
			if(!empty($_FILES['img']['tmp_name'])){
				
	            $info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = $data['type'].'__'.$res;
	                 // var_dump($info);
	                $slogoPath = $this->thumpic( $info['img'], '200', '200', $uniqu);
	                // var_dump($slogoPath);
	                $M->where('id='.$res)->save(['img'=>ltrim($slogoPath, '.')]);      
	            }else{
		        	$M->delete($res);
		        	$this->error('添加失败！请重新添加！',U('information/index',array('type'=>$data['type'])));
		        }
	  		}
	  		//添加轮播图
	  		
	  		$this->success('添加成功！',U('information/index',array('type'=>$data['type'])));
	  		
        }else{
        	$this->error('添加失败！请重新添加！',U('information/index',array('type'=>$data['type'])));
        }
	}
	//显示编辑页面
    public function upd(){
    	$this->isLogin();
		$info = M('information')->where('id='.I('get.id'))->find();
		$type = $info['type'];
		$name = getTypeName($type);
		$clist = M('cate')->where(array('type'=>$type))->select();
		$ulist = M('user')->field('uid,name')->select();
		if($info['img_id']){
                $image = M("images");
                $map['id']=array('in',$info['img_id']);
                $img_info = $image->where($map)->order('id asc')->select();
                $this->assign("img_info", $img_info);
            }
            // var_dump($img_info);exit;
		$this->assign('ulist',$ulist);
		$this->assign('clist',$clist);
		$this->assign('type',$type);
		$this->assign('name',$name);
		$this->assign('info',$info);
		$this->display();
    }
    //编辑逻辑
    public function update(){
    	$M = M('information');
    	$data          = I('post.');
		$data['updatetime'] = time();
		$data['content'] = htmlspecialchars_decode($data['content']);
		//多图上传
		$M_image = M("images");
            $map['id']=$data['id'];
            $image_ids=$M->where($map)->getField('img_id');
            $image_map['id']=array('in',$image_ids);
            $M_image->where($image_map)->delete();
            $data['img_id']='';
            $image = $data['lunbo'];
            if($image){
            if(is_array($image)){
                $image_id=array();
                foreach($image as $k=>$v){
                    $img_data['savepath']=$v;
                    if($v)
                    $image_id[$k]=$M_image->add($img_data);
                }
                $data['img_id']=implode(',',$image_id);
            }
        }
		$res = $M->where('id='.$data['id'])->save($data);
		if($res){
			if(!empty($_FILES['img']['tmp_name'])){
				$info = $this->uploadfile($_FILES);
	            if(!empty($info)){
	                //处理logo
	                $uniqu = $data['type'].'__'.$res;

	                $slogoPath = $this->thumpic( $info['img'], '200', '200', $uniqu);
	               	M('information')->where('id='.$data['id'])->save(['img'=>ltrim($slogoPath, '.')]);
	                $this->success('修改成功！',U('information/index',array('type'=>$data['type'])));
	            }else{
	            	$this->error('修改失败！',U('information/index',array('type'=>$data['type'])));
	            }	
            	
       		}else{
       			$this->success('修改成功！',U('information/index',array('type'=>$data['type'])));	
       		}
		}else{
			$this->error('系统错误！',U('information/index',array('type'=>$data['type'])));	
		}

    }


    public function del(){
		$id = trim(I('get.Mid'));
		// $image_path = './Uploads/Logos/' . $file['savepath'] . 'ppic_' . $id . '.png';
		// @unlink($image_path);
		$res = M('information')->delete($id);
		return $res;
	}

	







}