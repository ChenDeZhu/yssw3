<?php

return array(
	//'配置项'=>'配置值'
	// 地址不区分大小写
	//'URL_CASE_INSENSITIVE' => true, 
	// 显示页面Trace信息
	//'SHOW_PAGE_TRACE'      => true,
/******************* 数据库设置 **********************/
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_NAME'   => 'yssw', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '123456ab', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PARAMS' =>  array(), // 数据库连接参数
	'DB_PREFIX' => 'ys_', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志

/******************* 静态文件路径设置 **************************/	
    'TMPL_PARSE_STRING' => array(
	    '__PUBLIC__' => __ROOT__ . '/Public',
	    'UPLOAD_PATH'=> __ROOT__ . '/Uploads',//图片上传路径
	    //后台静态路径
	    '__AJS__'    => __ROOT__ . '/Public/Admin/Js',
	    '__ACSS__'   => __ROOT__ . '/Public/Admin/Css',
	    '__AIMAGE__' => __ROOT__ . '/Public/Admin/Images',
	    '__LIB__'	 => __ROOT__ . '/Public/Admin/Lib',
		'__SKIN__'	 => __ROOT__ . '/Public/Admin/Skin',
	      
		//前台静态路径
	    '__HJS__'    => __ROOT__ . '/Public/Home/Js',
	    '__HCSS__'   => __ROOT__ . '/Public/Home/Css',
	    '__HIMAGE__' => __ROOT__ . '/Public/Home/Images',
	    '__HLIB__'   => __ROOT__ . '/Public/Home/Lib',
	    '__MUI__'    => __ROOT__ . '/Public/Home/Template',
    ),

	'UPLOAD_PATH' => './Uploads/Images/',//前台图片上传地址
	'WEB_FOLDER'  =>	'',
	'WEBURL'      =>	'http://yu.naerkeji.com',
);
