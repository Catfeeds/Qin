<?php
namespace app\wap\controller;
use think\Controller;
use think\Request;
use \think\Url;
use think\Db;

class Weixin extends Controller
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
			return $_GET['echostr'];
		}

	}

	public function get_token()
	{
		//数据库秘钥是否过期
		$mysql_token=db('access_token')->where('esc','通用')->where('add_time','elt',time())->find();

		if(!$mysql_token)
		{

			//地址
			$grant_type="client_credential";
			//用户id
			$appid="wxefb6fb5cb420cd2b";
			//用户密码
			$secret="ed345b2b3da3166a7fd642e9a2d2b8f9";
			//请求路径+参数
			$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=$grant_type&appid=$appid&secret=$secret";

			//请求
			$json=file_get_contents($url);

			//处理json对象
			$arr=json_decode($json,true);

			//保存秘钥在服务器。
			db('access_token')->insert(['token'=>$arr['access_token'],'esc'=>'通用','add_time'=>time()+7100]);

			return $arr['access_token'];

		}else{

			return $mysql_token['token'];
		}
	}

	//网页授权
	public function hello()
	{
		$appid = "wxefb6fb5cb420cd2b";
		//回调页面
		$red_url="http%3a%2F%2Fwww.qnysj.com%2Fwap%2Fweixin%2Findex_user.html";
		if(input('redurl'))
		{
			$red_url="http%3a%2F%2Fwww.qnysj.com%2Fwap%2Fweixin%2F".input('redurl').".html";
		}

		$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$red_url&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";

		header("Location:".$url);

		echo "请求失败";
		exit;

	}
	
	//微信访问官网
	public function index_qnysj(){

		file_put_contents("text.txt","回调成功！".PHP_EOL,FILE_APPEND);
		//登录状态
		$this->add_session();
		
		$url = Url::build('index/index');

		$this->redirect($url);

	}

	//微信访问个人中心
	public function index_user(){

		//登录状态
		$this->add_session();

		$url = Url::build('index/user');
		$this->redirect($url);

	}

	//微信访问选手列表
	public function lists_player(){
		//登录状态
		$this->add_session();

		$url = Url::build('lists/list_player');
		$this->redirect($url);
	}

	//微信访问赛事报名
	public function player_index(){
		//登录状态
		$this->add_session();

		$url = Url::build('player/index');
		$this->redirect($url);
	}

	//授权后返回页面
	public function add_session()
	{
		//根据返回的code,获取用户的access_token,openid
		$appid = "wxefb6fb5cb420cd2b";  
		$secret = "ed345b2b3da3166a7fd642e9a2d2b8f9";  
		$code = $_GET["code"];
		
		file_put_contents("text.txt",$code,FILE_APPEND);
		
		$get_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";

		$curl = curl_init();  //启用curl会话
		curl_setopt($curl,CURLOPT_URL,$get_token_url);  //地址
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
		$json_obj = json_decode($res,true);
		
		$access_token = $json_obj['access_token'];  
		$openid = $json_obj['openid'];
		
		file_put_contents("text.txt",$openid,FILE_APPEND);

		session('openid',$openid);

		$user=db('user')->where('openid',$openid)->find();
		if($user){
			//如果有，则说明已经绑定过
			//缓存用户信息与openid
			$auth = array(
					'id'              => $user['id'],
					'name'        => $user['name'],
					'user_name'       =>$user['user_name'],
					'user_img'       =>$user['img'],
					'last_time' => time(),
			);

			/* 记录登录SESSION和COOKIES */
			$tt=['last_time'=>time(),'login'=>$user['login']+1,'ip'=>\think\Request::instance()->ip()];
			db('user')->where('id',$user['id'])->update($tt);

			//积分+1
			int_number($user['id'],1);

			session('m_user_auth', $auth);
			session('m_user_auth_sign',data_auth_sign($auth));	
		}else{
			//没有，则转跳到登录页面
			//缓存openid作为标shi，并转跳
			$url = Url::build('login/wx_login');
			$this->redirect($url);
		}
	}


}
