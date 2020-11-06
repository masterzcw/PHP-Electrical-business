<?php
/**
 * Created by PhpStorm.
 * User: ziniu
 * Date: 2016/6/12
 * Time: 10:15
 */

namespace jingshan;

class Mredis{
	/* 这里替换为实例id和实例password */
	// 基础参数准备
	protected $host = "125945f062c14ec1.m.cnsha.kvstore.aliyuncs.com";
	//protected $host = "127.0.0.1";
	protected $port = 6379;
	protected $user = "125945f062c14ec1";
	protected $pwd = "Li02131421";
	protected $max = 10000;
	protected $key = 'shop';
	// 设置数据库
	protected $redis;

	// 构造函数 连接数据库
	public function __construct(){
		$this->redis = new \Redis();
		/* 连接内网redis数据库 */
		if ($this->redis->connect($this->host, $this->port) == false) {
			die($this->redis->getLastError());
		}
		if($this->host!="127.0.0.1"){
			/* user:password 拼接成AUTH的密码 */
			if ($this->redis->auth($this->user . ":" . $this->pwd) == false) {
				die($this->redis->getLastError());
			}

		}
	}

	//插入数值
	public function set_vaule($value){
		// 设置基数标志位
		if(!$this->redis->get('flag')){
			$this->redis->set('flag',1);
		}
		// 插入非重复数据
		if($this->redis->zAdd($this->key,$this->redis->get('flag'),$value)){
			$this->redis->incr("flag");
		}
		// 检测溢出
		if($this->redis->get('flag')>$this->max){
			return 'overflow';
		}
	}

	// 返回全部存储数据
	public function get_value(){
		return $this->redis->zRange($this->key,0,-1);
	}
	// 类结束了
}