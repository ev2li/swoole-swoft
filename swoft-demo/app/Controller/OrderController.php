<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-09
 * Time: 17:31
 */

namespace App\Controller;


use App\Exception\ApiException;
use App\Models\OrdersDetail;
use App\Models\OrdersMain;
use Swoft\Db\DB;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Validator\Annotation\Mapping\Validate;
use App\MyValidator\OrderValidator;
/**
 * Class OrderController
 * @Controller(prefix="/order")
 */
class OrderController
{
    /**
     *
     * @RequestMapping(route="new", method={RequestMethod::POST})
     *
     */
    public function createOrder(){
        $orderPost = jsonForObject(OrdersMain::class);
        $orderNo = date("Ymf").substr(implode(NULL, array_map( 'ord', str_split(substr(uniqid(), 7,13),1))),0,8);
        $orderDetail_array = mapToModelsArray($orderPost->getOrderItems(), OrdersDetail::class, ["order_no" => $orderNo], true); //子订单数据,true代表返回的是一个数组，和数据库字段名一样
//        throw new ApiException("api except");
        if($orderPost){
            if($orderPost->save()){
                $orderPost->setOrderNo($orderNo);
                $orderPost->setCreateTime(date('Y-m-d h:i:s'));
                tx(function ()use($orderPost, $orderDetail_array, $orderNo) {
                    if($orderPost->save() && OrdersDetail::insert($orderDetail_array)){
                        return OrderCreateSuccess($orderNo);
                    }
                    throw new \Exception("创建订单失败");
                }, $result);
            }
        }
        return $orderPost;
    }
}