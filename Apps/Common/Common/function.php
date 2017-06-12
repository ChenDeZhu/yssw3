<?php
//根据参数type返回对应的名字
//0：招聘 1：求职 2：供应 3：求购 4：出租 5：转让
function getTypeName($type){
	$name='';
	switch ($type){
		case 0:
		  $name = "招聘";break;
		case 1:
		  $name="求职";break;
		case 2:
		  $name="供应";break;
		case 3:
		  $name="求购";break;
		case 4:
		  $name="出租";break;
		case 5:
		  $name="转让";break;
		}
		return $name;
}