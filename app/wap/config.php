<?php

return [
    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    //模板输出替换
	'view_replace_str'  =>  [
		'__PUBLIC__'=>'/public',
		'__ROOT__' => '/',
		'__wap__'=>'/public/wap',
		'__IMG__' => '/public/wap/img',
		'__CSS__' => '/public/wap/css',
		'__JS__' => '/public/wap/js',
		'__STATIC__'=>'/public/static',
	],
	
	// 默认跳转页面对应的模板文件
	'dispatch_success_tmpl'  => APP_PATH . 'wap/view/public/success.html',
    'dispatch_error_tmpl'    => APP_PATH . 'wap/view/public/error.html',

	
];
