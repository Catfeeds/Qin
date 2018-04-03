<?php
namespace app\admin\controller;
use think\Request;
use think\Db;

class Index extends App
{
    public function index()
    {
		//超过10天的通知信息全部删除
		//db("record")->where('type!=1')->where("add_time","<",time()-864000)->delete();
		
		return $this->fetch();
	}
	
}
