<?php

return [
    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    //模板输出替换
	'view_replace_str'  =>  [
		'__PUBLIC__'=>'/public',
		'__ROOT__' => '/',
		'__index__'=>'/public/index',
		'__IMG__' => '/public/admin/image',
		'__CSS__' => '/public/admin/css',
		'__JS__' => '/public/admin/js',
		'__STATIC__'=>'/public/static',
	],
	
	// 默认跳转页面对应的模板文件
	'dispatch_success_tmpl'  => APP_PATH . 'index/view/public/success.html',
    'dispatch_error_tmpl'    => APP_PATH . 'index/view/public/error.html',

	
];
