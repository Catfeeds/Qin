<?php

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
	file_put_contents("weixin_text.txt","获取微信接口通用token".PHP_EOL,FILE_APPEND);
	if($mysql_token)
	{
		//是否过期
		if($mysql_token['add_time']>=time())
		{
			file_put_contents("weixin_text.txt","数据库token有效".PHP_EOL,FILE_APPEND);
			return $mysql_token['token'];

		}else{
			file_put_contents("weixin_text.txt","重新获取token".PHP_EOL,FILE_APPEND);
			//请求
			$json=file_get_contents($url);

			//处理json对象
			$arr=json_decode($json,true);

			file_put_contents("weixin_text.txt",$json.PHP_EOL,FILE_APPEND);
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


function text_log($content)
{
	file_put_contents("weixin_text.txt",$content.PHP_EOL,FILE_APPEND);
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
	curl_setopt($curl, CURLOPT_TIMEOUT, 5);//超时限制防止死循环
	curl_setopt($curl,CURLOPT_HEADER,0); //显示header区域内容
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );  //以文件流返回结果
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
	
	$res = curl_exec($curl);
	if(curl_error($curl)){
		echo 'Errno'.curl_error($curl);
		file_put_contents("weixin_text.txt",'Errno'.curl_error($curl).PHP_EOL,FILE_APPEND);
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
	curl_setopt($curl, CURLOPT_TIMEOUT, 5);//超时限制防止死循环
	curl_setopt($curl,CURLOPT_HEADER,0); //显示header区域内容
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );  //以文件流返回结果
	$res = curl_exec($curl);
	if(curl_error($curl)){
		echo 'Errno'.curl_error($curl);
	}
	curl_close($curl);
	return json_decode($res,true);
}
