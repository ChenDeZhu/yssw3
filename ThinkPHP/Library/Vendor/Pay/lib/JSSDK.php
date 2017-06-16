<?php
namespace Home\Controller;
class JSSDK {
  private $appId;
  private $appSecret;

  public function __construct($appId, $appSecret) {
    $this->appId = $appId;
    $this->appSecret = $appSecret;
  }
  
  public function getSignPackage() {
    $jsapiTicket = $this->getJsApiTicket();

    // 注意 URL 一定要动态获取，不能 hardcode.
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $timestamp = time();
    $nonceStr = $this->createNonceStr();

    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

    $signature = sha1($string);

    $signPackage = array(
      "appId"     => $this->appId,
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "signature" => $signature,
      "rawString" => $string
    );
    return $signPackage; 
  }
  public function download($media_id){
  	$accessToken = $this->getAccessToken();
  	$downloadurl="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=$accessToken&media_id=$media_id";
  	$ch = curl_init($downloadurl);
  	curl_setopt($ch, CURLOPT_HEADER, 0);
  	curl_setopt($ch, CURLOPT_NOBODY, 0);    //对body进行输出。
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($downloadurl, CURLOPT_TIMEOUT, 5000);
  	$package = curl_exec($ch);
  	$httpinfo = curl_getinfo($ch);
  	curl_close($ch);
  	$media = array_merge(array('mediaBody' => $package), $httpinfo);
  	
  	//求出文件格式
  	preg_match('/\w\/(\w+)/i', $media["content_type"], $extmatches);
  	$fileExt = $extmatches[1];
  	$filename = $media_id.".{$fileExt}";
  	$dirname = "./Uploads/images/";
  	if(!file_exists($dirname)){
  		mkdir($dirname,0777,true);
  	}
  	file_put_contents($dirname.$filename,$media['mediaBody']);
  	return "/Uploads/images/".$filename;
  }
    public function download_media($media_id){
        $accessToken = $this->getAccessToken();
        $downloadurl="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=$accessToken&media_id=$media_id";
        $ch = curl_init($downloadurl);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOBODY, 0);    //对body进行输出。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($downloadurl, CURLOPT_TIMEOUT, 5000);
        $package = curl_exec($ch);
        $httpinfo = curl_getinfo($ch);
        curl_close($ch);
        $media = array_merge(array('mediaBody' => $package), $httpinfo);

        //求出文件格式
        preg_match('/\w\/(\w+)/i', $media["content_type"], $extmatches);
        $fileExt = $extmatches[1];
        $filename = $media_id.".{$fileExt}";
        $filename1 = $media_id.".mp3";
        $dirname = "./Uploads/medias/";
        file_put_contents($dirname.$filename,$media['mediaBody']);
        return "/Uploads/medias/".$filename1;
    }
  private function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }
 
  private function getJsApiTicket() {
    // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode(file_get_contents("jsapi_ticket.json"));
    if ($data->expire_time < time()) {
      $accessToken = $this->getAccessToken();
      // 如果是企业号用以下 URL 获取 ticket
      // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
      $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
      $res = json_decode($this->httpGet($url));
      $ticket = $res->ticket;
      if ($ticket) {
        $data->expire_time = time() + 7000;
        $data->jsapi_ticket = $ticket;
        $fp = fopen("jsapi_ticket.json", "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
    } else {
      $ticket = $data->jsapi_ticket;
    }

    return $ticket;
  }

  private function getAccessToken() {
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode(file_get_contents("access_token.json"));
    if ($data->expire_time < time()) {
      // 如果是企业号用以下URL获取access_token
      // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
      $res = json_decode($this->httpGet($url));
      $access_token = $res->access_token;
      if ($access_token) {
        $data->expire_time = time() + 7000;
        $data->access_token = $access_token;
        $fp = fopen("access_token.json", "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
    } else {
      $access_token = $data->access_token;
    }
    return $access_token;
  }

  private function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
  }
  private function httpPost($url = '', $param = ''){
    if (empty($url) || empty($param)) {
      return false;
    }
    $postUrl = $url;
    $curlPost = $param;
    $ch = curl_init(); //初始化curl
    curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页
    curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
    $data = curl_exec($ch); //运行curl
    curl_close($ch);
    return $data;
  }

  private function http_request($url,$data=array()){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    // POST数据
    curl_setopt($ch, CURLOPT_POST, 1);
    // 把post的变量加上
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
  }

  public function push($touser, $template_id, $data,$url,  $topcolor = '#7B68EE'){
    $access_token=$this->getAccessToken();
    /*$data=array(
        'first'=>array('value'=>urlencode("您好,您已购买成功"),'color'=>"#743A3A"),
        'accountType'=>array('value'=>urlencode("会员"),'color'=>'#EEEEEE'),
        'account'=>array('value'=>urlencode('50'),'color'=>'#FFFFFF'),
        'amount'=>array('value'=>urlencode('50'),'color'=>'#FFFFFF'),
        'result'=>array('value'=>urlencode('啊啊啊啊啊啊啊啊啊'),'color'=>'#FFFFFF'),
        'remark'=>array('value'=>urlencode('永久有效!密码为:1231313'),'color'=>'#FFFFFF'),
    );*/
    //模板消息
    $template=array(
        'touser'=>$touser,
        'template_id'=>$template_id,
        'url'=>$url,
        'topcolor'=>$topcolor,
        'data'=>$data
    );
    $json_template=json_encode($template);
    $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
    $res=$this->http_request($url,urldecode($json_template));
  }
  
  //模板消息 
  public function send_template_message($data){
    $accessToken = $this->getAccessToken();
    $url  = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$accessToken";
    $res = $this->http_request($url,$data);
    return json_decode($res,true);
  }
/*
  //https请求（支持get和post）
  protected function http_request($url,$data=null){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
    if(!empty($data)){
      curl_setopt($curl,CURLOPT_POST,1);
      curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
    }
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
  }
  */
  
}

