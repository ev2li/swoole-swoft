<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-03
 * Time: 17:15
 */
use function Swoole\Coroutine\run;
class MySqlPool
{
    protected $pool; //存储连接对象
    private $config;
    private static $instance;
    private $mysql;

    /**
     * @desc获取连接池实例
     * @param array|null $config
     * @return MySqlPool
     */
    public static function getInstance(array $config = null){
        if(empty(self::$instance)){
            if(empty($config)){
                throw new RuntimeException("mysql config is empty");
            }
            self::$instance = new static($config);
        }
        return self::$instance;
    }

    private function __construct(array $config = null)
    {
        if (empty($this->pool)){
            $this->config = $config;
            //通过协程来创建mysql对象
            run(function ()use($config){
                $this->pool = new chan($config['pool_size']);
                for($i = 0; $i < $config['pool_size']; $i++){
                    go(function() use ($config){
                        $mysql = new Swoole\Coroutine\MySQL();
                        $res = $mysql->connect($config);
                        if ($res === false){
                            throw new RuntimeException("Failed to mysql connect server!");
                        }else{
                            $this->pool->push($mysql);
                        }
                    });
                }
            });
        }
    }

    /**
     * @desc 获取连接
     */
    public function get(){
        go(function (){
            if($this->pool->length()){
                $this->mysql = $this->pool->pop();
                if(false === $this->mysql){
                    throw new RuntimeException("mysql timeout");
                }
                defer(function (){
                    $this->pool->push($this->mysql);
                });
            }else{
                throw new RuntimeException("mysql pool is empty");
            }
        });
        return $this->mysql;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}


$config = [
    "pool_size"   =>  8,
    "pool_get_timeout"    =>  0.5,
    "timeout" =>  0.5, //建立连接的超时时间
    "charset"   =>  "utf8mb4",
    "host"  =>  "127.0.0.1",
    "port"  => 3306,
    "user"  =>  "root",
    "password"  => "123456",
    "database"  => "logadmin"
];

$mysqlPool = MySqlPool::getInstance($config);
$mysql = $mysqlPool->get();
var_dump($mysql);