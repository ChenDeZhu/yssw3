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
		$pro = F('profiles');
		$pro['profiles'] = htmlspecialchars_decode($pro['profiles']);
		$this->assign('pro',$pro);
		$this->display();
	}
	public function pupt(){
		$data          = I('post.');
		$data['pdate'] = date('Y-m-d H:i:s',time());
		$data['profiles'] = htmlspecialchars_decode($data['editorValue']);
		F('profiles',$data);
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