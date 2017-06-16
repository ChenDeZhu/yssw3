<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController{
		
	public function isLogin(){
		if(!isset($_SESSION['uid'])){
			echo "login";
			sleep(1);
			$this->success('注册成功', $_SESSION['from']);
			// $this->redirect('/loginlogin');
		}else{
			return true;
		}

	}

	public function login(){
		$appid ="wx53630ec8fbb17ecb";
        $redirect_uri=urlencode("http://www.jtys114.com/index.php/Login/oauth");
        header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect');
	}
	public function oauth(){
        $code = $_GET['code'];
        $state = $_GET['state'];
        $appid = "wx53630ec8fbb17ecb";
        $appsecret = "3bbfec4499541a3499f30cf97bbd5b67";
        if (empty($code)) $this->error('授权失败');
        $token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';
        $token = json_decode(file_get_contents($token_url));
        if (isset($token->errcode)) {
            echo '<h1>错误：</h1>'.$token->errcode;
            echo '<br/><h2>错误信息：</h2>'.$token->errmsg;
            exit;
        }
        $access_token_url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.$appid.'&grant_type=refresh_token&refresh_token='.$token->refresh_token;
        //转成对象
        $access_token = json_decode(file_get_contents($access_token_url));
        if (isset($access_token->errcode)) {
            echo '<h1>错误：</h1>'.$access_token->errcode;
            echo '<br/><h2>错误信息：</h2>'.$access_token->errmsg;
            exit;
        }
        $user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token->access_token.'&openid='.$access_token->openid.'&lang=zh_CN';
        $userstr=file_get_contents($user_info_url);
        $wxuserObj=json_decode($userstr);
        $openid=$wxuserObj->openid;
        $model=M("user");
        $member=$model->where(array('openid'=>$openid))->find();
        if($member){
            $_SESSION['mid'] = $member['uid'];
            $this->success('登录成功跳转中...',$_SESSION['from'],0);
        }else{
            $data['openid']=$wxuserObj->openid;
            $data['name']=$wxuserObj->nickname;
            $data['avatar']=$wxuserObj->headimgurl;
            $data['sex']=$wxuserObj->sex;
            $data['reg_ip']=get_client_ip();
            $data['reg_time']=time();
            $data['province']=$wxuserObj->province;
            $data['city']=$wxuserObj->city;
            $data['pwd']='e10adc3949ba59abbe56e057f20f883e';
            $result=$model->add($data);
            if($result){
                $_SESSION['mid']=$result;
                $this->success('登录成功跳转中...',$_SESSION['from'],0);
            }else{
                echo '系统异常';
            }
        }
    }

    public function t_login(){
        $popularize = $_GET['tuid'];
        $appid ="wx53630ec8fbb17ecb";
        $redirect_uri=urlencode("http://www.jtys114.com/index.php/Login/toauth?popularize=".$popularize);
        header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect');
    }

    public function toauth(){
        $code = $_GET['code'];
        $state = $_GET['state'];
        $popularize = I('get.popularize');
        $appid = "wx53630ec8fbb17ecb";
        $appsecret = "3bbfec4499541a3499f30cf97bbd5b67";
        if (empty($code)) $this->error('授权失败');
        $token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';
        $token = json_decode(file_get_contents($token_url));
        if (isset($token->errcode)) {
            echo '<h1>错误：</h1>'.$token->errcode;
            echo '<br/><h2>错误信息：</h2>'.$token->errmsg;
            exit;
        }
        $access_token_url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.$appid.'&grant_type=refresh_token&refresh_token='.$token->refresh_token;
        //转成对象
        $access_token = json_decode(file_get_contents($access_token_url));
        if (isset($access_token->errcode)) {
            echo '<h1>错误：</h1>'.$access_token->errcode;
            echo '<br/><h2>错误信息：</h2>'.$access_token->errmsg;
            exit;
        }
        $user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token->access_token.'&openid='.$access_token->openid.'&lang=zh_CN';
        $userstr=file_get_contents($user_info_url);
        $wxuserObj=json_decode($userstr);
        $openid=$wxuserObj->openid;
        $model=M("user");
        $member=$model->where(array('openid'=>$openid))->find();
        if($member){
            $_SESSION['mid'] = $member['uid'];
            $this->success('登录成功跳转中...',$_SESSION['from'],0);
        }else{
        	//添加用户信息到用户表
        	$data['tuid'] = $popularize;
            $data['openid']=$openid;
            $data['name']=$wxuserObj->nickname;
            $data['avatar']=$wxuserObj->headimgurl;
            $data['sex']=$wxuserObj->sex;
            $data['reg_ip']=get_client_ip();
            $data['reg_time']=time();
            $data['province']=$wxuserObj->province;
            $data['city']=$wxuserObj->city;
            $data['pwd']='e10adc3949ba59abbe56e057f20f883e';
            $result=$model->add($data);
            //查出公司所设定的推广所得积分与推广所得金额
            $set = M('setting')->field('score,money')->find(1);
            //给推荐人加积分加钱
            $model->where('uid='.$popularize)->setInc('score',$set['score']);
            $model->where('uid='.$popularize)->setInc('money',$set['money']);
            // 添加到金额明细里去
            $map['uid'] = $popularize;
            $map['type'] = 3;
            $map['moeny'] = $set['money'];
            $map['addtime'] = time();
            M('money_detail')->add($map);
            // 查询出上级推荐人的上级推荐人
            $popularize2 = $model->where('uid='.$popularize)->getField('tuid');
            //如果存在
            if($popularize2){
            	$model->where('uid='.$popularize2)->setInc('score',$set['score']);
	            $model->where('uid='.$popularize2)->setInc('money',$set['money']);
	            // 添加到金额明细里去
	            $map['uid'] = $popularize2;
	            $map['type'] = 3;
	            $map['moeny'] = $set['money'];
	            $map['addtime'] = time();
	            M('money_detail')->add($map);
            }
            if($result){
                $_SESSION['mid']=$result;
                $this->success('登录成功跳转中...',U('user/my'),0);
            }else{
                echo '系统异常';
            }
        }
    }
}