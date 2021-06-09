<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-08
 * Time: 15:13
 */
namespace App\lib;

class MyRequest
{
    private $do = false;
    private $result;

    public function if($bool){
        $this->do = $bool;
        return clone $this;
    }

    public function go(callable $func){ //运行协程调用
        sgo(function () use ($func){
            $func();
        });
    }

    public function then(callable $func){
        if($this->do){
           $this->result = $func();
           $this->do = !$this->do;
        }
        return clone $this;
    }

    public function getResult(){
        return $this->result;
    }
}