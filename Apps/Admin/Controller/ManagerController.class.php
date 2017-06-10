<?php
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends BaseController {
    public function index(){

        $this->isLogin();

    	$Muser = D('manager');
        $condition = 'flag >= 0';
        
        $key = I('param.key','');
        if($key != ''){
              $condition = $condition . " and ( username like  '%" . $key . "%') ";
        }
        $count = $Muser->where($condition)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->parameter['key'] = $key ;
        $show = $Page->show();// 分页显示输出
    	$res = $Muser->where($condition)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('list',$res);
        $this->assign('count',$count);
    	$this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    public function add(){
        $this->isLogin();
        if(empty($_POST)){
            $this->display();
        }else{
            $Muser=D('manager');
            $data=I('post.');
            $data['joindate'] = date('Y-m-d H:i:s');
            $data['password'] = md5($data['password']);
            $r=$Muser->add($data);
            if ($r) {
                $this->success("管理员新增成功！",U('Manager/index'),3);
            }else{
                $this->error("管理员新增失败！"); //查询失败后返回上一页
            }
        }
    }

    //管理员信息状态修改 Mid传入管理员id
    public function Mzhuangtai(){

        $this->isLogin();

        $Muser = D('manager');
        $id = I('get.Mid');
        $zt = I('get.zt');
        switch ($zt) {
            case 'T':
                $data['flag'] = 0 ;
                break;
            case 'K':
                $data['flag'] = 1 ;
                break;
            case 'S':
             $data['flag'] = 99 ;
             break;
        }
	    $condition = "id=" . $id ;
        
        if($zt == 'S'){
	        $res = $Muser->where($condition)->delete();
        }else{
	        $res = $Muser->where($condition)->save($data);
	    }    
        return $res;
    }      

    //密码修改
    public function modpass(){

        $this->isLogin();

        $Muser = D('manager');

        if(empty($_POST)){

            $id = I('get.id',0);
            $res = $Muser->where('id=' . $id)->find();
            $this->assign('list',$res);
            $this->display();

        }else{
            $data=$Muser->create();
            if (!$data){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($Muser->getError());
            }else{
                
                $data['password'] = md5($data['password']);


                $r=$Muser->save($data);
 
                $this->success("修改成功！",U('Manager/index'),3);                
            }
        }
    }

        //返回 一个8位的随机数
    private function getYqma(){
        $length = 6 ;
        $min = pow(10 , ($length - 1));
        $max = pow(10, $length) - 1;
        //这个需要完善，需要判断数据库中是否重复！
        $randx = rand($min, $max); 
        return $randx;
    }
}