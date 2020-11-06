<?php
/**
 * Created by PhpStorm.
 * User: ziniu
 * Date: 2016/6/2
 * Time: 15:50
 */
header("Content-type:text/html;charset=utf-8");
//$host = "6e85cbc04c91457d.m.cnhza.kvstore.aliyuncs.com";
$host = "127.0.0.1";
$port = 6379;

/* 这里替换为实例id和实例password */
$user = "6e85cbc04c91457d";
$pwd = "Li02131421";
$t1 = microtime(true);
$redis = new Redis();
if ($redis->connect($host, $port) == false) {
	die($redis->getLastError());
}

/* user:password 拼接成AUTH的密码 */
//if ($redis->auth($user . ":" . $pwd) == false) {
//	die($redis->getLastError());
//}
if(!$redis->get('flag')){
	$redis->set('flag',1);
}
//if($redis->zAdd('shop',$redis->get('flag'),100001)){
//	$redis->incr("flag");
//}
var_dump($redis->zRange('shop',0,-1));
$t2 = microtime(true);
echo '耗时'.round($t2-$t1,3).'秒';