<?php
/**
 * Created by PhpStorm.
 * User: ziniu
 * Date: 2016/6/12
 * Time: 15:34
 */
// 转存信息 进入到 mysql 进行数据持久化

// 基础准备
namespace jingshan;
header("Content-type:text/html;charset=utf8");
include_once 'lib/Mredis.class.php';
include_once 'lib/PdoMiao.class.php';

// 获取数据
$Mredis = new Mredis();
$v = $Mredis->get_value();
$v = array_map(function($a){
	return unserialize($a);
},$v);

// 插入数据
$i = new PdoMiao();
$i->insert($v);