<?php
/**
 * Created by PhpStorm.
 * User: ziniu
 * Date: 2016/6/12
 * Time: 16:08
 */

namespace jingshan;

class PdoMiao {
	protected $config     = array(
		//'hostname'          =>  'rm-bp15c7k47tx39267r.mysql.rds.aliyuncs.com', // 服务器地址
		'hostname'          => '127.0.0.1',
		'database'          =>  'jingshan',          // 数据库名
		'hostport'          =>  '3306',        // 端口
		'charset'           =>  'utf8',      // 数据库编码默认采用utf8
	);
	protected $dbn;
	protected $user = 'root';
	protected $pwd  = 'H7oq5Io6';
	// 远程连接
	public function __construct(){
		$dsn = $this->parseDsn($this->config);
		try{
			$this->dbn = new \PDO($dsn,$this->user,$this->pwd);
		}catch (\PDOException $e){
			echo 'Connection failed: '.$e->getMessage();
		}
	}
	// dsn 组装
	protected function parseDsn($config){
		$dsn  =   'mysql:dbname='.$config['database'].';host='.$config['hostname'];
		if(!empty($config['hostport'])) {
			$dsn  .= ';port='.$config['hostport'];
		}
		if(!empty($config['charset'])){
			$dsn  .= ';charset='.$config['charset'];
		}
		return $dsn;
	}
	// 插入数据到数据库
	Public function insert($datas){
		$sql = "INSERT INTO  `miaosha` ( `id` , `phone` , `number` ) VALUES ( NULL ,  ?,  ? );";
		$sth = $this->dbn->prepare($sql);
		foreach($datas as $k => $v){
			$sth->execute($v);
		}
	}
	// 类结束了
}