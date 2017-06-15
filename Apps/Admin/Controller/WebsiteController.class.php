<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 
*/
class WebsiteController extends BaseController
{
	/**
	 * [profile 网站配置信息]
	 * @return [type] [description]
	 */
	public function profile(){
		$this->isLogin();
		// $pro = F('profiles');
		$pro = M('setting')->find(1);
		$pro['content'] = htmlspecialchars_decode($pro['content']);
		if($pro['img_id']){
                $image = M("images");
                $map['id']=array('in',$pro['img_id']);
                $img_info = $image->where($map)->order('id asc')->select();
                $this->assign("img_info", $img_info);
            }
		$this->assign('pro',$pro);
		$this->display();
	}
	public function pupt(){
		$data          = I('post.');
		$data['update'] = time();
		$data['content'] = htmlspecialchars_decode($data['content']);

		$M_image = M("images");
            $map['id']=$data['id'];
            $image_ids=M('setting')->where($map)->getField('img_id');
            $image_map['id']=array('in',$image_ids);
            if($image_ids){
            	$M_image->where($image_map)->delete();
        	}
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


		M('setting')->save($data);
		$this->success('修改成功！',U('Website/profile'));
	}

	/**
	 * [contact 联系我们]
	 * @return [type] [description]
	 */
	public function contact(){
		$this->isLogin();
		$cont = F('contacts');
		$cont = htmlspecialchars_decode($cont);
		$this->assign('cont',$cont);
		$this->display();
	}
	public function cpupt(){
		$data          = I('post.');
		$data['contacts'] = htmlspecialchars_decode($data['editorValue']);
		F('contacts',$data['contacts']);
		$this->success('修改成功！',U('Website/contact'));
	}
}