<?php

// 模块公共文件

/**
 * 是否登录
 * @return integer 0-未登录，大于0-当前登录管理员ID
 */
function is_login(){
    $admin = session('m_user_auth');
    if (empty($admin)) {
        return 0;
    } else {
        return session('m_user_auth_sign') == data_auth_sign($admin) ? $admin['id'] : 0;
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
 * 根据ID统计字段
 */
function sum_field($id,$where,$table,$field,$method){
	$data = db($table)->where(array($where=>$id))->$method($field);
	return $data;
}

//统计来访
function get_record($id){
	$data=db('record')->where('wid',$id)->where('type!=1')->count('id');
	return $data;
}

//统计相册
function get_hpoto($id){
	$data=db('hpoto')->where('user_id',$id)->where('status',1)->count('id');
	return $data;
}

//统计留言
function get_guestbook($id){
	$data=db('guestbook')->where('wid',$id)->where('status',1)->count('id');
	return $data;
}

//查询分类下的帖子数量
function get_bbs_articlem_num($id){
	$e=db('articlem')->where('module_id',$id)->count('id');
	if(!$e){$e = 0;}
	return $e;
}

/**
 * 增长用户积分
 * @return integer 增长用户积分
 */
function int_number($id,$num=1){
	$obj=db('user')->where('id',$id)->find();
    db('user')->where('id',$obj['id'])->update(['int_number'=>$obj['int_number']+$num]);
}