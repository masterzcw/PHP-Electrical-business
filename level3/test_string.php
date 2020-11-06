<?php
/**
 * Created by PhpStorm.
 * User: ziniu
 * Date: 2016/6/12
 * Time: 10:40
 */

$str    = 1111;
$end    = 9999;
$salt   = array("L","J","S","H");
$str    = rand($str,$end);
$a      = $str.$str%ord($salt[0]);
$str    = rand($str,$end);
$b      = $str.$str%ord($salt[1]);
$str    = rand($str,$end);
$c      = $str.$str%ord($salt[2]);
$str    = rand($str,$end);
$d      = $str.$str%ord($salt[3]);
$res    = $a.'-'.$b.'-'.$c.'-'.$d;
echo $res;


//$res    = '177022-879765-97143-979171';
$res    = explode('-',$res);
$flag   = true;
foreach($res as $k => $v){
	$v_start    = substr($v,0,4);
	$v_end      = substr($v,4);
	$v_new      = $v_start-$v_end;
	if($v_new%ord($salt[$k])){
		$flag = false;
	}
}
var_dump($flag);