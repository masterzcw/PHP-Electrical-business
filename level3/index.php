<?php
/**
 * Created by PhpStorm.
 * User: ziniu
 * Date: 2016/6/1
 * Time: 10:20
 */
//1 基础数据准备
namespace jingshan;
header("Access-Control-Allow-Origin: http://www.miaosha_level2.net"); //防止 跨域
$data = array('msg'=>'false');// 初始数据准备

//2 库文件引入
include_once 'lib/Mrgister.class.php';
include_once 'lib/Mredis.class.php';
include_once 'lib/function.php';

//3 整理数据 获取前台数据输入
$I = new Mrgister();
$I->I();
$value = serialize($I->get_value());

//4 数据队列存储流程
$Mredis = new Mredis();
if($Mredis->set_vaule($value)=='overflow'){
	sendOver();// 发送处理
}else{
	$data = array('msg'=>'ok');
}

//5 返回结果到前台
$callback = $_GET['callback'];
echo $callback.'('.json_encode($data).')';