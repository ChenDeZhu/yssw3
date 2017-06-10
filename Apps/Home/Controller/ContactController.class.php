<?php
namespace Home\Controller;
use Think\Controller;

class ContactController extends BaseController
{
	public function index(){
		$this->display('contact');
	}
}