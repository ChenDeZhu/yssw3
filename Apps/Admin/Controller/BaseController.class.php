<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 
*/
class BaseController extends Controller
{
	//--------------------------------------------------------------
    //是否登录
    public function isLogin(){
        if(session('admin')==''){
           redirect(U('Index/login'), 0, '页面跳转中...');
        }
    }
    /**
     * [getCname 获取分类名称]
     * @param  [type] $id    [分类ID]
     * @param  [type] $sheet [表名]
     * @return [type]        [分类名称]
     */
    public function getCname($sheet, $id){
        $cname = M($sheet)->where('id='.$id)->getField('cname');
        return $cname;
    }
    
    /**
     * [getCateList 分类列表]
     * @param  [type] $sheet [标明]
     * @return [type]        [分类列表]
     */
    public function getCateList($sheet){
        $list = M($sheet)->select();
        return $list;
    }

    /**
     * 
     * @param  [type] $sheet [表名]
     * @param  [type] $order [排序]
     * @param  [type] $list  [模板变量]
     * @return [type]        [arr]
     */
    public function getList($sheet, $order, $list){
        $this->isLogin();
        $count   = M($sheet)->count();
        $p       = new \Think\Page($count,15);
        $listarr = M($sheet)->order($order)->limit($p->firstRow,$p->listRows)->select();
        $this->assign($list, $listarr);
        $this->assign('count',$count);
        $this->assign('page',$p->show());
        $this->display();
    }
    public function _empty(){
        echo "系统服务器繁忙";
    }
    
    /**
     * [uploadfile 推按上传]
     * @param  [arr] $files [临时文件]
     * @return [arr] $info  [上传后文件信息]
     */
    public function uploadfile($files) {
        $config = array(
            'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
            'exts'          =>  array('jpg', 'gif', 'png', 'jpeg'), //允许上传的文件后缀
            'autoSub'       =>  false, //自动子目录保存文件
            'rootPath'      =>  './Uploads/Logos/', //保存根路径
            'savePath'      =>  '', //保存路径
            'saveName'      =>  array('uniqid', time()), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        );
        $obj = new \Think\Upload($config);// 实例化上传类
        $info = $obj->upload();
        if(!$info) {
            return array('status' =>0, 'msg'=> $obj->getError() );
        }else{     
            return $info;
        }
    }
    /**
     * [thumpic 生成缩略图，同名同地址覆盖]
     * @param  [arr] $file        [图片信息]
     * @param  string $thumbWidth  [图片宽]
     * @param  string $thumbHeight [图片高]
     * @return string $image_path  [缩略图地址]
     */
    public function thumpic($file, $thumbWidth='', $thumbHeight='',$uniqu){  
        $image = new \Think\Image();
        $image_path = './Uploads/Logos/' . $file['savepath'] . $file['savename'];
        $thumb_path = './Uploads/Logos/' . $file['savepath'] . $uniqu . '.png';
        $image->open( $image_path )->thumb( $thumbWidth, $thumbHeight,\Think\Image::IMAGE_THUMB_FILLED )->save( $thumb_path );
        @unlink($image_path); //上传生成缩略图以后删除源文件,同名同地址覆盖
        return $thumb_path;  
    } 
}