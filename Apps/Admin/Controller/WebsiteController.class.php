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
		$this->assign('pro',$pro);
		$this->display();
	}
	public function pupt(){
		$data          = I('post.');
		$data['update'] = time();
		$data['content'] = htmlspecialchars_decode($data['editorValue']);
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