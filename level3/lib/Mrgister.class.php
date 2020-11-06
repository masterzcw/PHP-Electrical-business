<?php
/**
 * Created by PhpStorm.
 * User: ziniu
 * Date: 2016/6/1
 * Time: 10:21
 */
namespace jingshan;
class Mrgister{
	// 数据
	protected $phone=0;
	protected $number=0;

	// 数安全过滤
	public function I(){
		$this->phone = floatval(isset($_GET['phone'])?$_GET['phone']:0);
		$this->number = (isset($_GET['number'])?$_GET['number']:0);
		if(!($this->phone&&$this->number&&$this->check_number())){
			die('input data wrong');
		}
		return $this;
	}
	// 验证输入码安全
	public function check_number(){// 其实用一个生成规则就好了
		//$this->number = '177022-879765-97143-979171';
		$flag   = true;
		$salt   = array("L","J","S","H");
		$res    = explode('-',$this->number);
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
	// 获取正确 数值
	public function get_value(){
		return array($this->phone,$this->number);
	}
// 类结束了
}