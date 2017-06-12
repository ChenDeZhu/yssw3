<?php
namespace Admin\Model;
use Think\Model;

class CateModel extends Model{
	static public $treeList = array();
	
	static public function tree($data,$pid = 0,$count = 1){
		foreach ($data as $key => $value){
            if($value['pid']==$pid){
                $value['Count'] = $count;
                self::$treeList []=$value;
                unset($data[$key]);
                self::tree($data,$value['cid'],$count+1);
            } 
        }
        return self::$treeList;

	}
}