<?php

// 模块公共文件

/**
 * 是否登录
 * @return integer 0-未登录，大于0-当前登录管理员ID
 */
function is_login(){
    $admin = session('user_auth');
    if (empty($admin)) {
        return 0;
    } else {
        return session('user_auth_sign') == data_auth_sign($admin) ? $admin['id'] : 0;
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
 * 网页左侧排名信息
 * @param  array  
 * @return string       
 */

function left_school(){
    //左侧列表---学校人数排行
	$list_school_user=db('player') ->field('sid,sname,count(user_id) as ct')
								->group('sname')

								->where('sname','neq','')
								->limit(15)
								->order('ct desc')
								->select();
    return $list_school_user;
}

function left_reg(){
    //左侧列表---地区人数排行
	$list_reg_user=db('player') ->field('ssid,ssname,count(user_id) as ct')
								->group('ssname')
								->where('status',1)
								->where('ssname','neq',"")
								->limit(15)
								->order('ct desc')
								->select();

    return $list_reg_user;
}

function left_player(){
   //左侧列表---热门选手排行
	//$list_news_look=db('news')->where('status',1)->order('look desc')->limit(15)->select();
	//$this->assign('list_news_look',$list_news_look);

	$list_player_back_3=db('player')->field('user_id as id,user_name,back_3')
					  ->distinct(true)
					  ->field('user_name')
					  ->where('status=1 and back_2!=2 and so_open=1')
					  ->limit(15)
					  ->order('back_3 desc')->select();
    return $list_player_back_3;
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
 * 增长用户积分
 * @return integer 增长用户积分
 */
function int_number($id,$num=1){
	$obj=db('user')->where('id',$id)->find();
    db('user')->where('id',$obj['id'])->update(['int_number'=>$obj['int_number']+$num]);
}

function int_number_load()
{
	$list=db('user')->select();
	foreach($list as $k=>$v)
	{
		//初始积分
		$num=0;
		
		//登录积分
		$num+=intval($v['login']);

		//动态积分
		$art_number=db('article')->where('user_id',$v['id'])->field('count(*) as num')->find();

		$num+=intval($art_number['num']);

		//评论积分
		$art_number=db('comments')->where('user_id',$v['id'])->field('count(*) as num')->find();
		$num+=intval($art_number['num']);

		//留言积分
		$art_number=db('record')->where('user_id',$v['id'])->field('count(*) as num')->find();
		$num+=intval($art_number['num']);

		//积分上传
		db('user')->where('id',$v['id'])->update(['int_number'=>$num]);

	}
}

