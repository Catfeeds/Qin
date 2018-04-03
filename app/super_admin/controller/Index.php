<?php
namespace app\super_admin\controller;
use think\Request;
use think\Db;

class Index extends App
{
    public function index()
    {
		return $this->fetch();
	}
	
}
