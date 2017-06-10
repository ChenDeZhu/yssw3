<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $this->isLogin();
        $this->display();
    }
    public function login(){
        if(!empty($_POST)){
            $M=M("manager");
            // 检验验证码
            $VerifyCode=I('post.Verify');
            $verify = new \Think\Verify();
            $verifyresult=($verify->check($VerifyCode,'')); 
            $data=$M->create($_POST,2);
            
            if (!$data){
                 // 如果创建失败 表示验证没有通过 输出错误提示信息
                 $this->error($M->getError());

            }elseif (!$verifyresult) {
                echo 1;//$this->error("验证码输入错误！"); 
                die();
            }else{
                $condition['username'] = $data['username'];
                $condition['password'] =md5($data['password']);
                $condition['flag'] = 1;
                $r=$M->where($condition)->find();
            }

            if ($r) {
                session('admin',$data['username']);
                $data1['lastlogintime'] = date('Y-m-d h:i:s',time());
                $data1['lastloginip'] = get_client_ip();
                M('manager')->where("username='%s'",$data['username'])->save($data1);
                echo 3;//$this->success("登录成功！",'index',2);
                die();
            }else{
               echo 2;//$this->error("登录失败，可能是用户名、密码有误，请重试！");
               die(); 
            }
        }else{
            $this->display();
        }
    }

    //退出登录
    public function loginout(){
        session('admin',null);
        $this->redirect('login');

    }

    // 页面获取注册码
    public function VerifyShow(){
        $config =    array(
            'fontSize'    =>    16,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            'imageW'      =>    120,   //宽度
            'imageH'      =>    35,    //高度
            'useZh'       =>    false, //是否显示汉子
            'useCurve'    =>    false, //是否显示干扰线
            'codeSet'     =>    '0123456789',
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }    


    public function welcome(){
        $this->isLogin();
        $M = M('huiyuanxinxi');
        $res['huiyuanshu'] = $M->count();
        $res['zongjine'] = $M->sum(zongjine);
        $this->assign('vo',$res); 
        $this->display();
    }
    
}