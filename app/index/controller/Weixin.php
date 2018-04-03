<?php
namespace app\index\controller;
use think\Request;
use think\Db;

class Weixin extends App
{
	//微信开发者认证
    public function index()
    {
		$signature=$_GET["signature"];
        $timestamp=$_GET["timestamp"];
        $nonce=$_GET["nonce"];
		$token='liuxin9477';

		$tmpArr = array($token, $timestamp, $nonce);
		//排序
		sort($tmpArr, SORT_STRING);
		//数组转换成字符
		$tmpStr=implode($tmpArr);
		//加密
		$tmpStr=sha1($tmpStr);

		if($tmpStr==$signature)
		{
			echo $_GET['echostr'];
		}	
		
		return view();

	}

	public function get_token()
	{

		//数据库秘钥是否过期
		$mysql_token=db('access_token')->where('esc','通用')->where('add_time','elt',time())->find();

		if($mysql_token)
		{

			//地址
			$grant_type="client_credential";
			//用户id
			$appid="wx5019c39e8b0303ab";
			//用户密码
			$secret="367b08af387da6437cbd4ca6d038ec53";
			//请求路径+参数
			$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=$grant_type&appid=$appid&secret=$secret";

			//请求
			$json=file_get_contents($url);

			//处理json对象
			$arr=json_decode($json,true);

			//保存秘钥在服务器。
			db('access_token')->insert(['token'=>$arr['access_token'],'esc'=>'通用','add_time'=>time()+7200]);

		}

		dump(date('Y-m-d h:i',time()+7199));
		exit;
	}

	//网页授权
	public function haha()
	{
		$appid = "wxa06be7ba934d1eec";  
		$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=http://www.qnysj.com/index/weixin/hehe&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";  

		dump($url);
		exit;

		header("Location:".$url); 
	}

	//授权后返回页面
	public function hehe()
	{

		//根据返回的code,获取用户的access_token
		$appid = "wxa06be7ba934d1eec";  
		$secret = "3980a81674139716afa83f889adf1a8d";  
		$code = $_GET["code"];  
		$get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';  
		  
		$ch = curl_init();  
		curl_setopt($ch,CURLOPT_URL,$get_token_url);  
		curl_setopt($ch,CURLOPT_HEADER,0);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );  
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);  
		$res = curl_exec($ch);  
		curl_close($ch);  
		$json_obj = json_decode($res,true);  
		  
		//根据openid和access_token查询用户信息  
		$access_token = $json_obj['access_token'];  
		$openid = $json_obj['openid'];  
		$get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';  
		  
		$ch = curl_init();  
		curl_setopt($ch,CURLOPT_URL,$get_user_info_url);  
		curl_setopt($ch,CURLOPT_HEADER,0);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );  
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);  
		$res = curl_exec($ch);  
		curl_close($ch);  
		  
		//解析json  
		$user_obj = json_decode($res,true);  
		$_SESSION['user'] = $user_obj;  
		dump($user_obj);
		
		
	}

	
}
