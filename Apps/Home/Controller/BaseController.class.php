<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller
{
	public function _empty(){
        echo "系统服务器繁忙";
    }

    /**
     * [getList 获取数据]
     * @param  [type] $sheet  [表名]
     * @param  [type] &$limit [数据数目]
     * @return [type]         [返回数据]
     */
    public function getList($sheet,$limit){
    	if (!empty($limit)) {
    		$list = D($sheet)->limit($limit)->order('id desc')->select();
    	}else{
    		$list = D($sheet)->order('id desc')->select();
    	}
    	return $list;
    }
    
    /**
     * [getCateList 获取分类列表]
     * @param  [type] $sheet [表名]
     * @param  [type] $order [排序]
     * @return [type]        [数据]
     */
    public function getCateList($sheet,$order){
    	$clist = D($sheet)->order($order)->select();
    	return $clist;
    }
}