<?php

// 模块公共文件

/**
 * 检测管理员是否登录
 * @return integer 0-未登录，大于0-当前登录管理员ID
 */
function is_login(){
    $admin = session('admin_auth');
    if (empty($admin)) {
        return 0;
    } else {
        return session('admin_auth_sign') == data_auth_sign($admin) ? $admin['id'] : 0;
    }
}

/**
 * 数据签名认证
 * @param  array  $data 被认证的数据
 * @return string       签名
 */
function data_auth_sign($data) {
    //数据类型检测
    if(!is_array($data)){
        $data = (array)$data;
    }
    ksort($data); //排序
    $code = http_build_query($data); //url编码并生成query字符串
    $sign = sha1($code); //生成签名
    return $sign;
}

/**
 * 时间戳格式化
 * @param int $time
 * @return string 完整的时间显示
 */
function time_format($time = NULL,$format='Y-m-d H:i'){
    $time = $time === NULL ? time() : intval($time);
    return date($format, $time);
}


/**
 * 获取微信access_token
 * 
 */
function get_token()
{
	//地址
	$grant_type="client_credential";
	//用户id
	$appid="wxefb6fb5cb420cd2b";
	//用户密码
	$secret="ed345b2b3da3166a7fd642e9a2d2b8f9";
	//请求路径+参数
	$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=$grant_type&appid=$appid&secret=$secret";

	//数据库秘钥是否过期
	$mysql_token=db('access_token')->where('esc','通用')->find();

	if($mysql_token)
	{
		//是否过期
		if($mysql_token['add_time']>=time())
		{
			return $mysql_token['token'];

		}else{
			//请求
			$json=file_get_contents($url);

			//处理json对象
			$arr=json_decode($json,true);

			//保存秘钥在服务器。
			db('access_token')->where('id',$mysql_token['id'])->update(['token'=>$arr['access_token'],'add_time'=>time()+7100]);

			return $arr['access_token'];
		}

	}
	else
	{
		//请求
		$json=file_get_contents($url);

		//处理json对象
		$arr=json_decode($json,true);

		//保存秘钥在服务器。
		db('access_token')->insert(['token'=>$arr['access_token'],'esc'=>'通用','add_time'=>time()+7100]);

		return $arr['access_token'];
	}
}


/**
 * 微信请求post
 * 
 */

function curl_post($url,$data)
{
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);  //地址
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false); //检查认证来源
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($curl,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']); //模拟使用用户浏览器
	curl_setopt($curl,CURLOPT_AUTOREFERER,1); //自动跳转
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);//超时限制防止死循环
	curl_setopt($curl,CURLOPT_HEADER,0); //显示header区域内容
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );  //以文件流返回结果
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
	
	$res = curl_exec($curl);
	if(curl_error($curl)){
		echo 'Errno'.curl_error($curl);
	}
	curl_close($curl);
	return json_decode($res,true);
}


function curl_get($url)
{
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);  //地址
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0); //检查认证来源
	curl_setopt($curl,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']); //模拟使用用户浏览器
	curl_setopt($curl,CURLOPT_AUTOREFERER,1); //自动跳转
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);//超时限制防止死循环
	curl_setopt($curl,CURLOPT_HEADER,0); //显示header区域内容
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );  //以文件流返回结果
	$res = curl_exec($curl);
	if(curl_error($curl)){
		echo 'Errno'.curl_error($curl);
	}
	curl_close($curl);
	return json_decode($res,true);
}

