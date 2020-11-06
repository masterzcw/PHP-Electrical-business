<?php
/**
 * Created by PhpStorm.
 * User: ziniu
 * Date: 2016/6/12
 * Time: 11:21
 */
// 创建token 字符串
function create(){
	$str    = 1111;
	$end    = 9999;
	$salt   = array("L","J","S","H");
	$str    = rand($str,$end);// 5555 // L 23
	$a      = $str.$str%ord($salt[0]);// 5555. 21== 555521-555525-565656-
	$str    = rand($str,$end);
	$b      = $str.$str%ord($salt[1]);
	$str    = rand($str,$end);
	$c      = $str.$str%ord($salt[2]);
	$str    = rand($str,$end);
	$d      = $str.$str%ord($salt[3]);
	return $a.'-'.$b.'-'.$c.'-'.$d;
}
// 验证字符串
function check($res){
	$flag   = true;
	$salt   = array("L","J","S","H");
	$res    = explode('-',$res);
	foreach($res as $k => $v){
		$v_start    = substr($v,0,4);
		$v_end      = substr($v,4);
		$v_new      = $v_start-$v_end;
		if($v_new%ord($salt[$k])){
			$flag = false;
		}
	}
	return $flag;
}
// 发送通知信息
function sendOver(){
	$url_level1 = 'http://www.miaosha_level1.net/set_file.php';// 修改称为自己的触发位置
	$url_level2 = 'http://www.miaosha_level2.net/set_file.php';// 修改称为自己的触发位置
	$url_level4 = 'http://www.miaosha_level4.net/set_file.php';// 修改称为自己的触发位置
	// 收录完成
	// 触发第一层：
	$ch = curl_init();//初始化 GET 方式
	curl_setopt($ch, CURLOPT_URL, $url_level1);//设置选项，包括URL
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);//执行并获取HTML文档内容
	curl_close($ch);//释放curl句柄
	// 触发第二层：
	$ch = curl_init();//初始化 GET 方式
	curl_setopt($ch, CURLOPT_URL, $url_level2);//设置选项，包括URL
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);//执行并获取HTML文档内容
	curl_close($ch);//释放curl句柄
	// 触发第四层:
	$ch = curl_init();//初始化 GET 方式
	curl_setopt($ch, CURLOPT_URL, $url_level4);//设置选项，包括URL
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);//执行并获取HTML文档内容
	curl_close($ch);//释放curl句柄
}