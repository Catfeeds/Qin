<?php
namespace app\weixin\controller;
use think\Controller;

class Index extends Controller
{
	//微信开发者认证
    public function index()
    {
		/*
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
		*/

		//接收XML数据
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		//判断是否为空
        if (!empty($postStr)){
			//转换成php数组
              $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
              $RX_TYPE = trim($postObj->MsgType);
			  $resultStr="";
			  switch($RX_TYPE)
			  {
				case "text": //接收文字信息
					$resultStr=$this->textAlert($postObj);//文本信息
					break;
				case "image": 
					//$resultStr=$this->textAlert($postObj);//文本信息
					break;
				case "voice":
					//$resultStr=$this->textAlert($postObj);//文本信息
					break;
				case "video":
					//$resultStr=$this->textAlert($postObj);//文本信息
					break;
				case "shortvideo":
					//$resultStr=$this->textAlert($postObj);//文本信息
					break;
				case "location":
					//$resultStr=$this->textAlert($postObj);//文本信息
					break;
				case "link":
					//$resultStr=$this->textAlert($postObj);//文本信息
					break;
				case "event":
					$resultStr=$this->handleEvent($postObj);//推送信息
					break;
				default:
					$resultStr="";
					break;
			  }
			  
			  return $resultStr;
			
		}
	}

	//文本信息自动回复
	public function textAlert($postObj)
	{
		$resultStr="";

		//文本内容匹配数据库关键字
		$obj=db('wcar')->where('tid',1)->where('keywords','like','%'.$postObj->Content.'%')->find();

		if($obj)
		{
			if($obj['tname']==0)
			{
				$resultStr=$this->responseText($postObj,$obj['content']);
			}
			else if($obj['tname']==1)
			{
				$resultStr=$this->responseXml($postObj,$obj['content']);
			}
		}
		else
		{
			//返回默认信息
			$mr_obj=db('wcar')->where('tid',0)->find();
			if($mr_obj)
			{
				if($mr_obj['tname']==0)
				{
					$resultStr=$this->responseText($postObj,$mr_obj['content']);
				}
				else if($mr_obj['tname']==1)
				{
					$resultStr=$this->responseXml($postObj,$mr_obj['content']);
				}
			}
		}
		return $resultStr;
	}


	//推送事件
	public function handleEvent($object)
    {
        $contentStr = "";

		$ev=$object->Event;
        
		//扫描带参二维码
		if($ev=="SCAN")
		{
			$sjs=$object->EventKey;
			$strkey="";

			if(strpos($sjs,'qrscene_'))
			{
				$strkey=substr_replace('qrscene_',"",$sjs,0); 
			}else{
				$strkey=$sjs;
			}

			if(!db('eventkey')->where('key',$strkey)->find())
			{
				db('eventkey')->insert(['key'=>$strkey,'add_time'=>time()]);
			}
		}
		else if($ev=="subscribe")
		{
			 $contentStr = $this->responseText($object, "感谢您关注【青年文化艺术节】");

		}else if($ev=="CLICK"){

			$str=$object->EventKey;
			$contentStr = $this->responseXml($object,$str);

		}else{
			 $contentStr = "Unknow Event: ".$object->Event;
		}

        
        return $contentStr;
    }



	//返回文字信息
	public function responseText($postObj,$content)
	{
		//$content 不能为空，不能为""，否则公众号提示：无法提供服务

		$textTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					</xml>";
		$resultStr = sprintf($textTpl, $postObj->FromUserName, $postObj->ToUserName, time(), $content);
		return $resultStr;
	}

	//返回推送图文
	public function responseXml($postObj,$str)
	{
		//查询对应的图文素材
		$token=get_token();
		$url="https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=$token";

		$data['media_id']="$str";

		$list=curl_post($url,json_encode($data));

		$textTpl =  "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[news]]></MsgType>
					<ArticleCount>%s</ArticleCount>
					<Articles>";
		foreach($list["news_item"] as $k=>$v)
		{
			$textTpl .=	"<item>
					<Title><![CDATA[".$v['title']."]]></Title> 
					<Description><![CDATA[".$v['digest']."]]></Description>
					<PicUrl><![CDATA[".$v['thumb_url']."]]></PicUrl>
					<Url><![CDATA[".$v['url']."]]></Url>
					</item>";
		}
		
		$textTpl .="</Articles>
					</xml>";

		$resultStr = sprintf($textTpl, $postObj->FromUserName, $postObj->ToUserName, time(),count($list["news_item"]));

		return $resultStr;
	}






	//测试：查询指定id图文
	public function getxml()
	{
		$token=get_token();
		//查询对应的图文素材
		$url="https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=$token";
		$data['media_id']="Cyv65nvICSJwS8q1rhIFFJqkFFHzYdKaRhJAOyWmkro";

		$list=curl_post($url,json_encode($data));
		dump($list);
		foreach($list["news_item"] as $k=>$v)
		{
			dump($v);
		}
	}

	//获取当前公众号菜单
	public function caidan()
	{
		//获取秘钥
		$token=get_token();

		$url = "https://api.weixin.qq.com/cgi-bin/get_current_selfmenu_info?access_token=$token";

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
		$json_obj = json_decode($res,true);

		dump($json_obj);
	}

	//创建菜单
	public function add_button()
	{
		//获取秘钥
		$token=get_token();

		$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$token";

		//"type"=>"view_limited","name"=>"了解艺术节","media_id"=>"Cyv65nvICSJwS8q1rhIFFJqkFFHzYdKaRhJAOyWmkro",
		
		$data=json_encode(["button"=>[["name"=>"艺术节","sub_button"=>[[	
					   "type"=>"view",
						"name"=>"进入官网",
						"url"=>"http://www.qnysj.com/wap/weixin/hello.html?redurl=index_qnysj"],
					[
						   "type"=>"click",
						   "name"=>"了解艺术节",
						   "key"=>"Cyv65nvICSJwS8q1rhIFFJqkFFHzYdKaRhJAOyWmkro",
					 ],
					[
						 "type"=>"view",
						 "name"=>"选手风采",
						 "url"=>"http://www.qnysj.com/wap/weixin/hello.html?redurl=lists_player",
					 ]]
			  ],
			  [
				   "name"=>"报名参赛",
				   "sub_button"=>[
				   [	
					   "type"=>"view",
					   "name"=>"赛事报名",
					   "url"=>"http://www.qnysj.com/wap/weixin/hello.html?redurl=player_index"
					],
					[
						 "type"=>"click",
						 "name"=>"报名须知",
						 "key"=>"Cyv65nvICSJwS8q1rhIFFFfy8fmbxcDfNotVdm7HgRk",
					 ]]
			   ],
				[ 
					"name"=>"个人中心",
					"sub_button"=>[
					[
					   "type"=>"view",
					   "name"=>"个人中心",
					   "url"=>"http://www.qnysj.com/wap/weixin/hello.html?redurl=index_user"
						
					],
					[
						"type"=>"click",
					   "name"=>"使用须知",
					   "key"=>"Cyv65nvICSJwS8q1rhIFFPDBzrkRv5XrItZOTdjygzM"
					]]
				]]
		 ],JSON_UNESCAPED_UNICODE);

		 

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);  //地址
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0); //检查认证来源
		curl_setopt($curl,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']); //模拟使用用户浏览器
		curl_setopt($curl,CURLOPT_AUTOREFERER,1); //自动跳转
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);//超时限制防止死循环
		curl_setopt($curl,CURLOPT_HEADER,0); //显示header区域内容
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );  //以文件流返回结果
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$res = curl_exec($curl);
		if(curl_error($curl)){
			echo 'Errno'.curl_error($curl);
		}
		curl_close($curl);
		$json_obj = json_decode($res,true);

		dump($json_obj);

	}


}